<?php

namespace App\Services\Aljabar;

class UmpanBalikKesalahan
{
    /**
     * Mengenali pola kesalahan umum pemula dan memberikan petunjuk ramah tanpa membocorkan jawaban
     */
    public static function deteksiPolaSalah(string $inputSiswa, ?string $langkahSebelumnya = null): ?string
    {
        $input = str_replace(' ', '', strtolower($inputSiswa));

        // 1. Pola x + x = x^2 (mengira penjumlahan variabel menjadi kuadrat)
        if (str_contains($input, '^2') && $langkahSebelumnya !== null && ! str_contains($langkahSebelumnya, '^')) {
            return 'Ingat: x + x = 2x (koefisiennya dijumlahkan). Huruf berpangkat hanya muncul pada perkalian x × x.';
        }

        // 2. Pola menggabungkan suku tidak sejenis, misal 2x + 3y -> 5xy atau 5x
        if (preg_match('/^[0-9]+[a-z]{2,}$/', $input)) {
            return 'Hati-hati: suku dengan variabel berbeda (seperti x dan y) tidak sejenis, sehingga tidak bisa digabungkan.';
        }

        // 3. Pola distributif sebagian: 3(x+2) -> 3x+2 atau sejenisnya
        if ($langkahSebelumnya !== null && preg_match('/([0-9]+)\(([a-z])\+([0-9]+)\)/', str_replace(' ', '', $langkahSebelumnya), $m)) {
            $a = $m[1];
            $b = $m[3];
            $polaSalah = "{$a}{$m[2]}+{$b}";
            if ($input === $polaSalah) {
                return 'Perhatikan sifat distributif: angka di luar kurung harus mengalikan SEMUA suku di dalam kurung, bukan hanya suku pertama.';
            }
        }

        // 4. Pola tanda minus di depan kurung: -(x+5) -> -x+5
        if ($langkahSebelumnya !== null && str_contains($langkahSebelumnya, '-(')) {
            return 'Ingat: tanda minus di depan tanda kurung membalik tanda semua suku di dalam kurung (tambah menjadi kurang, dan sebaliknya).';
        }

        return null;
    }
}
