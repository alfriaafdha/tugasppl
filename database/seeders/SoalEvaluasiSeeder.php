<?php

namespace Database\Seeders;

use App\Models\SoalEvaluasi;
use App\Models\SubBab;
use Illuminate\Database\Seeder;

class SoalEvaluasiSeeder extends Seeder
{
    public function run(): void
    {
        $soalEvaluasiData = require __DIR__ . '/data/soal-evaluasi.php';

        $subBabs = SubBab::all()->keyBy('urutan');

        foreach ($soalEvaluasiData as $urutan => $listSoal) {
            $subBab = $subBabs->get($urutan);
            if (! $subBab) {
                continue;
            }

            foreach ($listSoal as $soal) {
                SoalEvaluasi::updateOrCreate(
                    [
                        'sub_bab_id' => $subBab->id,
                        'teks_soal' => $soal['teks_soal'],
                    ],
                    array_merge($soal, ['sub_bab_id' => $subBab->id])
                );
            }
        }
    }
}
