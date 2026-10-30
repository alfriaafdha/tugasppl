<?php

namespace App\Console\Commands;

use App\Models\EvaluasiAkhir;
use App\Services\Evaluasi\EvaluasiService;
use App\Services\Evaluasi\PenilaianService;
use Illuminate\Console\Command;

class TutupEvaluasiKedaluwarsa extends Command
{
    protected $signature = 'evaluasi:tutup-kedaluwarsa';
    protected $description = 'Menutup dan menilai percobaan evaluasi akhir yang telah melewati batas waktu';

    public function handle(EvaluasiService $evaluasiService, PenilaianService $penilaianService): int
    {
        $evaluasiBerlangsung = EvaluasiAkhir::where('status', 'berlangsung')->get();
        $ditutup = 0;

        foreach ($evaluasiBerlangsung as $evaluasi) {
            if ($evaluasiService->apakahKedaluwarsa($evaluasi)) {
                $penilaianService->nilaiEvaluasi($evaluasi);
                $ditutup++;
            }
        }

        $this->info("Menutup {$ditutup} evaluasi yang kedaluwarsa.");

        return Command::SUCCESS;
    }
}
