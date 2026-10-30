<?php

namespace Database\Seeders;

use App\Models\SubBab;
use Illuminate\Database\Seeder;

class SubBabSeeder extends Seeder
{
    public function run(): void
    {
        $materiA = file_get_contents(__DIR__ . '/data/materi-a.md');
        $materiB = file_get_contents(__DIR__ . '/data/materi-b.md');
        $materiC = file_get_contents(__DIR__ . '/data/materi-c.md');

        $subBabs = [
            [
                'judul' => 'Unsur-Unsur Bentuk Aljabar',
                'urutan' => 1,
                'teks_materi' => $materiA,
                'bobot_progres' => 0.3333,
            ],
            [
                'judul' => 'Sifat-Sifat dan Operasi Aljabar',
                'urutan' => 2,
                'teks_materi' => $materiB,
                'bobot_progres' => 0.3333,
            ],
            [
                'judul' => 'Pemodelan dengan Bentuk Aljabar',
                'urutan' => 3,
                'teks_materi' => $materiC,
                'bobot_progres' => 0.3334,
            ],
        ];

        foreach ($subBabs as $data) {
            SubBab::updateOrCreate(
                ['urutan' => $data['urutan']],
                $data
            );
        }
    }
}
