<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\EvaluasiAkhir;
use App\Services\Evaluasi\EvaluasiService;
use App\Services\Progres\ProgresService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EvaluasiController extends Controller
{
    public function __construct(
        protected EvaluasiService $evaluasiService,
        protected ProgresService $progresService
    ) {
    }

    /**
     * Halaman pengantar Evaluasi Akhir dan riwayat percobaan
     */
    public function index(): View
    {
        $siswa = Auth::user();
        $persen = $this->progresService->persenProgres($siswa);

        $riwayatEvaluasi = EvaluasiAkhir::where('pengguna_id', $siswa->id)
            ->orderByDesc('id')
            ->get();

        $evaluasiAktif = EvaluasiAkhir::where('pengguna_id', $siswa->id)
            ->where('status', 'berlangsung')
            ->latest('id')
            ->first();

        $kkm = config('aljabarlearn.kkm_evaluasi', 65);
        $jumlahSoal = config('aljabarlearn.evaluasi_jumlah_soal', 20);
        $durasiMenit = (int) (config('aljabarlearn.evaluasi_durasi_detik', 3600) / 60);

        return view('siswa.evaluasi.awal', compact(
            'siswa',
            'persen',
            'riwayatEvaluasi',
            'evaluasiAktif',
            'kkm',
            'jumlahSoal',
            'durasiMenit'
        ));
    }

    /**
     * Memulai atau melanjutkan pengerjaan evaluasi akhir
     */
    public function mulai(Request $request): RedirectResponse
    {
        $siswa = Auth::user();
        $ulang = $request->has('ulang');

        $evaluasi = $this->evaluasiService->ambilAtauMulaiPercobaan($siswa, $ulang);

        if ($evaluasi->status === 'dikumpulkan') {
            return redirect()->route('siswa.evaluasi.hasil', $evaluasi->id);
        }

        return redirect()->route('siswa.evaluasi.kerja', $evaluasi->id);
    }

    /**
     * Lembar ujian pengerjaan 20 soal Evaluasi Akhir
     */
    public function kerja(EvaluasiAkhir $evaluasi): View|RedirectResponse
    {
        $siswa = Auth::user();
        if ($evaluasi->pengguna_id !== $siswa->id) {
            abort(403, 'Akses ditolak.');
        }

        if ($evaluasi->status === 'dikumpulkan') {
            return redirect()->route('siswa.evaluasi.hasil', $evaluasi->id);
        }

        // Cek apakah waktu sudah habis
        if ($this->evaluasiService->apakahKedaluwarsa($evaluasi)) {
            $this->evaluasiService->kumpulkan($evaluasi);
            return redirect()->route('siswa.evaluasi.hasil', $evaluasi->id)
                ->with('info', 'Waktu ujian telah habis. Jawaban Anda otomatis dikumpulkan.');
        }

        $sisaDetik = $this->evaluasiService->sisaWaktuDetik($evaluasi);

        $daftarJawaban = $evaluasi->jawabanEvaluasi()
            ->with('soalEvaluasi')
            ->get();

        $persen = $this->progresService->persenProgres($siswa);

        return view('siswa.evaluasi.kerja', compact(
            'siswa',
            'persen',
            'evaluasi',
            'sisaDetik',
            'daftarJawaban'
        ));
    }

    /**
     * Endpoint API: Autosave jawaban per soal
     */
    public function simpanJawaban(Request $request, EvaluasiAkhir $evaluasi, int $soalId): JsonResponse
    {
        $siswa = Auth::user();
        if ($evaluasi->pengguna_id !== $siswa->id || $evaluasi->status !== 'berlangsung') {
            return response()->json(['sukses' => false, 'pesan' => 'Akses ditolak.'], 403);
        }

        $jawaban = (string) $request->input('jawaban', '');
        $this->evaluasiService->simpanJawaban($evaluasi, $soalId, $jawaban);

        return response()->json(['sukses' => true]);
    }

    /**
     * Mengumpulkan lembar evaluasi akhir
     */
    public function kumpul(EvaluasiAkhir $evaluasi): RedirectResponse
    {
        $siswa = Auth::user();
        if ($evaluasi->pengguna_id !== $siswa->id) {
            abort(403, 'Akses ditolak.');
        }

        $this->evaluasiService->kumpulkan($evaluasi);

        return redirect()->route('siswa.evaluasi.hasil', $evaluasi->id)
            ->with('success', 'Evaluasi Akhir berhasil dikumpulkan!');
    }

    /**
     * Halaman hasil evaluasi akhir
     */
    public function hasil(EvaluasiAkhir $evaluasi): View
    {
        $siswa = Auth::user();
        if ($evaluasi->pengguna_id !== $siswa->id) {
            abort(403, 'Akses ditolak.');
        }

        $persen = $this->progresService->persenProgres($siswa);
        $kkm = config('aljabarlearn.kkm_evaluasi', 65);

        $daftarJawaban = $evaluasi->jawabanEvaluasi()
            ->with('soalEvaluasi')
            ->get();

        return view('siswa.evaluasi.hasil', compact(
            'siswa',
            'persen',
            'evaluasi',
            'kkm',
            'daftarJawaban'
        ));
    }
}
