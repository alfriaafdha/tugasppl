<?php

namespace App\Services\Evaluasi;

use App\Models\EvaluasiAkhir;
use App\Models\JawabanEvaluasi;
use App\Services\Aljabar\BentukAkhir;

class PenilaianService
{
    /**
     * Menilai seluruh jawaban evaluasi dan menghitung skor akhir
     *
     * @return array{nilai: int, benar: int, total: int, lulus_kkm: bool}
     */
    public function nilaiEvaluasi(EvaluasiAkhir $evaluasi): array
    {
        $jawabanList = JawabanEvaluasi::with('soalEvaluasi')
            ->where('evaluasi_akhir_id', $evaluasi->id)
            ->get();

        $totalSoal = $jawabanList->count();
        $benarCount = 0;

        foreach ($jawabanList as $jwb) {
            $soal = $jwb->soalEvaluasi;
            if (! $soal) {
                continue;
            }

            $input = trim((string) $jwb->jawaban);
            if ($input === '') {
                $jwb->update(['status_benar' => false]);
                continue;
            }

            $hasil = BentukAkhir::periksa(
                $soal->tipe,
                $input,
                $soal->jawaban_akhir,
                $soal->ekspresi_awal,
                $soal->nilai_variabel,
                $soal->variabel_array
            );

            $isBenar = $hasil['cocok'];
            if ($isBenar) {
                $benarCount++;
            }

            $jwb->update(['status_benar' => $isBenar]);
        }

        $kkm = config('aljabarlearn.kkm_evaluasi', 65);
        $skor = $totalSoal > 0 ? (int) round(($benarCount / $totalSoal) * 100) : 0;
        $lulusKkm = $skor >= $kkm;

        $evaluasi->update([
            'nilai' => $skor,
            'lulus_kkm' => $lulusKkm,
            'status' => 'dikumpulkan',
            'waktu_selesai' => now(),
        ]);

        return [
            'nilai' => $skor,
            'benar' => $benarCount,
            'total' => $totalSoal,
            'lulus_kkm' => $lulusKkm,
        ];
    }
}
