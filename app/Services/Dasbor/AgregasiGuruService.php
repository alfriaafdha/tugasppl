<?php

namespace App\Services\Dasbor;

use App\Models\Kuis;
use App\Models\LangkahKuis;
use App\Models\Pengguna;
use App\Models\SesiKuis;
use App\Models\SoalKuis;
use App\Models\SubBab;
use App\Services\Progres\ProgresService;

class AgregasiGuruService
{
    public function __construct(protected ProgresService $progresService)
    {
    }

    /**
     * Mengambil daftar semua siswa beserta persentase progres dan sub-bab terakhir
     */
    public function daftarSiswa(): array
    {
        $siswaList = Pengguna::where('peran', 'siswa')
            ->with(['progresSiswa.subBab', 'sesiKuis.kuis.subBab', 'evaluasiAkhir'])
            ->orderBy('nama')
            ->get();

        $hasil = [];

        foreach ($siswaList as $siswa) {
            $persen = $this->progresService->persenProgres($siswa);

            // Sub-bab terakhir yang tuntas atau sedang dikerjakan
            $subBabTerakhir = $siswa->progresSiswa
                ->where('status_tuntas', true)
                ->sortByDesc(fn ($p) => $p->subBab->urutan ?? 0)
                ->first()?->subBab?->judul ?? 'Belum memulai';

            $totalSesi = $siswa->sesiKuis->count();
            $evaluasiTerbaik = $siswa->evaluasiAkhir->max('nilai');
            $lulusEvaluasi = $siswa->evaluasiAkhir->where('lulus_kkm', true)->isNotEmpty();

            $hasil[] = [
                'id' => $siswa->id,
                'nama' => $siswa->nama,
                'email' => $siswa->email,
                'progres' => $persen,
                'sub_bab_terakhir' => $subBabTerakhir,
                'total_sesi' => $totalSesi,
                'nilai_evaluasi' => $evaluasiTerbaik,
                'lulus_evaluasi' => $lulusEvaluasi,
            ];
        }

        return $hasil;
    }

    /**
     * Mengambil ringkasan statistik agregat kelas
     */
    public function statistikKelas(): array
    {
        $siswaList = Pengguna::where('peran', 'siswa')->with(['evaluasiAkhir', 'progresSiswa'])->get();
        $totalSiswa = $siswaList->count();
        if ($totalSiswa === 0) {
            return [
                'total_siswa' => 0,
                'avg_progres' => 0,
                'siswa_tuntas' => 0,
                'siswa_lulus_evaluasi' => 0,
                'avg_nilai_evaluasi' => 0,
            ];
        }

        $totalProgres = 0;
        $siswaTuntas = 0;
        $siswaLulus = 0;
        $nilaiList = [];

        foreach ($siswaList as $siswa) {
            $p = $this->progresService->persenProgres($siswa);
            $totalProgres += $p;
            if ($p === 100) {
                $siswaTuntas++;
            }
            if ($siswa->evaluasiAkhir->where('lulus_kkm', true)->isNotEmpty()) {
                $siswaLulus++;
            }
            $maxNilai = $siswa->evaluasiAkhir->max('nilai');
            if ($maxNilai !== null) {
                $nilaiList[] = $maxNilai;
            }
        }

        return [
            'total_siswa' => $totalSiswa,
            'avg_progres' => (int) round($totalProgres / $totalSiswa),
            'siswa_tuntas' => $siswaTuntas,
            'siswa_lulus_evaluasi' => $siswaLulus,
            'avg_nilai_evaluasi' => count($nilaiList) > 0 ? (int) round(array_sum($nilaiList) / count($nilaiList)) : 0,
        ];
    }

    /**
     * Mengambil ringkasan materi sulit per sub-bab, per subtopik, dan per soal
     */
    public function ringkasanMateriSulit(): array
    {
        $subBabs = SubBab::with(['kuis.soalKuis'])->orderBy('urutan')->get();

        $ringkasan = [];

        foreach ($subBabs as $subBab) {
            $kuis = $subBab->kuis;
            if (! $kuis) {
                continue;
            }

            $sesiList = SesiKuis::where('kuis_id', $kuis->id)->where('status', 'selesai')->get();
            $avgDurasi = $sesiList->avg('durasi_detik') ?? 0;
            $avgPercobaan = SesiKuis::where('kuis_id', $kuis->id)->groupBy('pengguna_id')->selectRaw('count(*) as count')->pluck('count')->avg() ?? 1;
            $avgHint = $sesiList->avg('jumlah_hint_ai') ?? 0;

            // Hitung persentase langkah salah
            $langkahSemua = LangkahKuis::whereIn('sesi_kuis_id', $sesiList->pluck('id'))->get();
            $totalLangkah = $langkahSemua->count();
            $salahLangkah = $langkahSemua->where('status_benar', false)->count();
            $persenSalah = $totalLangkah > 0 ? round(($salahLangkah / $totalLangkah) * 100, 1) : 0;

            // Rincian per soal
            $detailSoal = [];
            foreach ($kuis->soalKuis as $soal) {
                $langkahSoal = LangkahKuis::where('soal_kuis_id', $soal->id)->get();
                $tot = $langkahSoal->count();
                $sal = $langkahSoal->where('status_benar', false)->count();
                $pctSalah = $tot > 0 ? round(($sal / $tot) * 100, 1) : 0;

                $detailSoal[] = [
                    'nomor' => $soal->nomor,
                    'subtopik' => $soal->subtopik,
                    'tipe' => $soal->tipe,
                    'teks_soal' => $soal->teks_soal,
                    'total_langkah' => $tot,
                    'persen_salah' => $pctSalah,
                ];
            }

            $ringkasan[] = [
                'sub_bab_id' => $subBab->id,
                'judul' => $subBab->judul,
                'urutan' => $subBab->urutan,
                'avg_durasi_detik' => (int) round($avgDurasi),
                'avg_percobaan' => round($avgPercobaan, 1),
                'avg_hint' => round($avgHint, 1),
                'persen_salah' => $persenSalah,
                'soal' => $detailSoal,
            ];
        }

        return $ringkasan;
    }

    /**
     * Mengambil detail lengkap seorang siswa untuk pemantauan guru
     */
    public function detailSiswa(Pengguna $siswa): array
    {
        $sesiList = SesiKuis::with(['kuis.subBab', 'langkahKuis.soalKuis'])
            ->where('pengguna_id', $siswa->id)
            ->orderByDesc('id')
            ->get();

        $evaluasiList = $siswa->evaluasiAkhir()->orderByDesc('id')->get();

        return [
            'siswa' => $siswa,
            'progres' => $this->progresService->persenProgres($siswa),
            'sesi_kuis' => $sesiList,
            'evaluasi_akhir' => $evaluasiList,
        ];
    }
}
