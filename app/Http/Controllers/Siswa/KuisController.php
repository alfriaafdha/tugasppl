<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\LangkahKuis;
use App\Models\SesiKuis;
use App\Models\SoalKuis;
use App\Models\SubBab;
use App\Services\Kuis\KuisService;
use App\Services\Progres\ProgresService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class KuisController extends Controller
{
    public function __construct(
        protected KuisService $kuisService,
        protected ProgresService $progresService
    ) {
    }

    /**
     * Memulai atau melanjutkan kuis untuk suatu sub-bab
     */
    public function mulai(SubBab $subBab): RedirectResponse
    {
        $siswa = Auth::user();
        $kuis = $subBab->kuis;

        if (! $kuis) {
            return back()->with('error', 'Kuis untuk sub-bab ini belum tersedia.');
        }

        $sesi = $this->kuisService->ambilAtauMulaiSesi($siswa, $kuis);
        $nomorAktif = $this->kuisService->nomorSoalAktif($sesi);

        return redirect()->route('siswa.kuis.soal', ['sesi' => $sesi->id, 'nomor' => $nomorAktif]);
    }

    /**
     * Mengulang kuis (membuat sesi percobaan baru)
     */
    public function ulang(SubBab $subBab): RedirectResponse
    {
        $siswa = Auth::user();
        $kuis = $subBab->kuis;

        if (! $kuis) {
            return back()->with('error', 'Kuis belum tersedia.');
        }

        $sesiBaru = $this->kuisService->ambilAtauMulaiSesi($siswa, $kuis, buatBaru: true);

        return redirect()->route('siswa.kuis.soal', ['sesi' => $sesiBaru->id, 'nomor' => 1])
            ->with('info', "Memulai percobaan kuis ke-{$sesiBaru->percobaan_ke}. Semangat!");
    }

    /**
     * Menampilkan lembar kerja soal kuis
     */
    public function soal(SesiKuis $sesi, int $nomor): View|RedirectResponse
    {
        $siswa = Auth::user();

        // Validasi kepemilikan sesi
        if ($sesi->pengguna_id !== $siswa->id) {
            abort(403, 'Anda tidak memiliki akses ke sesi kuis ini.');
        }

        // Validasi urutan soal: soal n+1 terkunci sampai soal n dikumpulkan
        if (! $this->kuisService->bolehAksesSoal($sesi, $nomor)) {
            $nomorAktif = $this->kuisService->nomorSoalAktif($sesi);
            return redirect()->route('siswa.kuis.soal', ['sesi' => $sesi->id, 'nomor' => $nomorAktif])
                ->with('error', 'Selesaikan dan kumpulkan soal sebelumnya terlebih dahulu.');
        }

        $soal = SoalKuis::where('kuis_id', $sesi->kuis_id)
            ->where('nomor', $nomor)
            ->firstOrFail();

        $langkahList = LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->orderBy('nomor_baris')
            ->get();

        $langkahTerakhir = $langkahList->last();
        $langkahInputTerakhir = $langkahList->where('dikumpulkan', false)->last();
        $ekspresiDraf = $langkahInputTerakhir && ! $langkahInputTerakhir->status_benar
            ? $langkahInputTerakhir->input_ekspresi
            : '';
        $ekspresiBenarTerakhir = $langkahList->where('status_benar', true)->where('dikumpulkan', false)->last()?->input_ekspresi ?? '';
        $jumlahLangkahBenar = $langkahList->where('status_benar', true)->where('dikumpulkan', false)->count();
        $semuaLangkahSelesai = $this->kuisService->langkahSudahSelesai($sesi, $soal);
        $sudahDikumpulkan = $langkahList->where('dikumpulkan', true)->isNotEmpty();
        $isReadOnly = ($sesi->status === 'selesai' || $sudahDikumpulkan);

        $subBab = $sesi->kuis->subBab;
        $persen = $this->progresService->persenProgres($siswa);
        $kamusIstilah = require database_path('seeders/data/kamus-istilah.php');

        return view('siswa.kuis.soal', compact(
            'siswa',
            'persen',
            'sesi',
            'soal',
            'subBab',
            'langkahList',
            'langkahTerakhir',
            'ekspresiDraf',
            'ekspresiBenarTerakhir',
            'jumlahLangkahBenar',
            'semuaLangkahSelesai',
            'sudahDikumpulkan',
            'isReadOnly',
            'kamusIstilah'
        ));
    }

    /**
     * Endpoint API: Validasi satu baris langkah pengerjaan (↵ Cek Step)
     */
    public function cekStep(Request $request, SesiKuis $sesi, int $nomor): JsonResponse
    {
        $siswa = Auth::user();
        if ($sesi->pengguna_id !== $siswa->id) {
            return response()->json(['benar' => false, 'pesan' => 'Akses sesi ditolak.'], 403);
        }

        if ($sesi->status === 'selesai') {
            return response()->json(['benar' => false, 'pesan' => 'Kuis ini sudah selesai (mode baca-saja).'], 400);
        }

        $soal = SoalKuis::where('kuis_id', $sesi->kuis_id)->where('nomor', $nomor)->firstOrFail();
        if ($nomor !== $this->kuisService->nomorSoalAktif($sesi)) {
            return response()->json(['benar' => false, 'pesan' => 'Kerjakan soal yang sedang terbuka terlebih dahulu.'], 422);
        }
        if ($soal->mode === 'langsung') {
            return response()->json(['benar' => false, 'pesan' => 'Soal ini memakai satu kolom jawaban. Kumpulkan jawabanmu setelah selesai.'], 422);
        }
        if ($this->kuisService->langkahSudahSelesai($sesi, $soal)) {
            return response()->json([
                'benar' => false,
                'selesai' => true,
                'pesan' => 'Jawaban akhir sudah tercapai. Kumpulkan jawabanmu untuk melanjutkan.',
            ], 422);
        }
        $ekspresi = (string) $request->input('ekspresi', '');

        $hasil = $this->kuisService->cekStep($sesi, $soal, $ekspresi);

        return response()->json($hasil);
    }

    /**
     * Endpoint API: Kumpulkan soal
     */
    public function kumpul(Request $request, SesiKuis $sesi, int $nomor): JsonResponse
    {
        $siswa = Auth::user();
        if ($sesi->pengguna_id !== $siswa->id) {
            return response()->json(['sukses' => false, 'pesan' => 'Akses sesi ditolak.'], 403);
        }

        if ($sesi->status === 'selesai') {
            return response()->json(['sukses' => false, 'pesan' => 'Kuis ini sudah selesai.'], 400);
        }

        $soal = SoalKuis::where('kuis_id', $sesi->kuis_id)->where('nomor', $nomor)->firstOrFail();
        if ($nomor !== $this->kuisService->nomorSoalAktif($sesi)) {
            return response()->json(['sukses' => false, 'pesan' => 'Kerjakan soal yang sedang terbuka terlebih dahulu.'], 422);
        }
        $jawabanAkhir = (string) $request->input('jawaban_akhir', '');

        $hasil = $this->kuisService->kumpulkanSoal($sesi, $soal, $jawabanAkhir);

        return response()->json($hasil);
    }
}
