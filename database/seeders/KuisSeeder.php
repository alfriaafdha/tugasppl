<?php

namespace Database\Seeders;

use App\Models\Kuis;
use App\Models\SoalKuis;
use App\Models\SubBab;
use Illuminate\Database\Seeder;

class KuisSeeder extends Seeder
{
    public function run(): void
    {
        $soalKuisData = require __DIR__ . '/data/soal-kuis.php';

        $subBabs = SubBab::all()->keyBy('urutan');

        foreach ($soalKuisData as $urutan => $listSoal) {
            $subBab = $subBabs->get($urutan);
            if (! $subBab) {
                continue;
            }

            $kuis = Kuis::updateOrCreate(
                ['sub_bab_id' => $subBab->id],
                ['judul' => 'Kuis Latihan ' . $subBab->judul]
            );

            foreach ($listSoal as $soal) {
                SoalKuis::updateOrCreate(
                    [
                        'kuis_id' => $kuis->id,
                        'nomor' => $soal['nomor'],
                    ],
                    array_merge($soal, [
                        'kuis_id' => $kuis->id,
                        'jumlah_langkah' => $soal['jumlah_langkah'] ?? null,
                    ])
                );
            }
        }
    }
}
