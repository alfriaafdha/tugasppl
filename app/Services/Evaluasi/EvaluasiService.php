<?php

namespace App\Services\Evaluasi;

use App\Models\EvaluasiAkhir;
use App\Models\JawabanEvaluasi;
use App\Models\Pengguna;
use App\Models\SoalEvaluasi;
use App\Models\SubBab;

class EvaluasiService
{
    public function __construct(protected PenilaianService $penilaianService)
    {
    }

    /**
     * Mengambil percobaan yang sedang berlangsung atau membuat percobaan baru
     */
    public function ambilAtauMulaiPercobaan(Pengguna $siswa, bool $ulang = false): EvaluasiAkhir
    {
        if (! $ulang) {
            $evaluasiAktif = EvaluasiAkhir::where('pengguna_id', $siswa->id)
                ->where('status', 'berlangsung')
                ->latest('id')
                ->first();

            if ($evaluasiAktif) {
                // Periksa apakah waktu sudah kedaluwarsa di sisi server
                if ($this->apakahKedaluwarsa($evaluasiAktif)) {
                    $this->penilaianService->nilaiEvaluasi($evaluasiAktif);
                } else {
                    return $evaluasiAktif;
                }
            }
        }

        $percobaanKe = (int) EvaluasiAkhir::where('pengguna_id', $siswa->id)->max('percobaan_ke') + 1;

        $evaluasi = EvaluasiAkhir::create([
            'pengguna_id' => $siswa->id,
            'percobaan_ke' => $percobaanKe,
            'status' => 'berlangsung',
            'waktu_mulai' => now(),
            'nilai' => 0,
            'lulus_kkm' => false,
        ]);

        // Pilih 20 soal dengan komposisi: 6 A, 8 B, 6 C
        $subBab1 = SubBab::where('urutan', 1)->first();
        $subBab2 = SubBab::where('urutan', 2)->first();
        $subBab3 = SubBab::where('urutan', 3)->first();

        $soalA = $subBab1 ? SoalEvaluasi::where('sub_bab_id', $subBab1->id)->inRandomOrder()->take(6)->get() : collect();
        $soalB = $subBab2 ? SoalEvaluasi::where('sub_bab_id', $subBab2->id)->inRandomOrder()->take(8)->get() : collect();
        $soalC = $subBab3 ? SoalEvaluasi::where('sub_bab_id', $subBab3->id)->inRandomOrder()->take(6)->get() : collect();

        $semuaSoal = $soalA->concat($soalB)->concat($soalC)->shuffle();

        foreach ($semuaSoal as $soal) {
            JawabanEvaluasi::create([
                'evaluasi_akhir_id' => $evaluasi->id,
                'soal_evaluasi_id' => $soal->id,
                'jawaban' => null,
                'status_benar' => false,
            ]);
        }

        return $evaluasi;
    }

    /**
     * Menghitung sisa durasi pengerjaan dalam detik
     */
    public function sisaWaktuDetik(EvaluasiAkhir $evaluasi): int
    {
        $durasiMaks = (int) config('aljabarlearn.evaluasi_durasi_detik', 3600);
        $waktuBerlalu = $evaluasi->waktu_mulai ? $evaluasi->waktu_mulai->diffInSeconds(now()) : 0;

        return max(0, $durasiMaks - $waktuBerlalu);
    }

    /**
     * Memeriksa apakah batas waktu ujian sudah habis
     */
    public function apakahKedaluwarsa(EvaluasiAkhir $evaluasi): bool
    {
        return $this->sisaWaktuDetik($evaluasi) <= 0;
    }

    /**
     * Menyimpan autosave jawaban per soal
     */
    public function simpanJawaban(EvaluasiAkhir $evaluasi, int $soalId, ?string $jawaban): void
    {
        if ($this->apakahKedaluwarsa($evaluasi)) {
            $this->penilaianService->nilaiEvaluasi($evaluasi);
            return;
        }

        JawabanEvaluasi::where('evaluasi_akhir_id', $evaluasi->id)
            ->where('soal_evaluasi_id', $soalId)
            ->update([
                'jawaban' => $jawaban,
            ]);
    }

    /**
     * Mengumpulkan evaluasi dan menghitung nilai
     */
    public function kumpulkan(EvaluasiAkhir $evaluasi): array
    {
        return $this->penilaianService->nilaiEvaluasi($evaluasi);
    }
}
