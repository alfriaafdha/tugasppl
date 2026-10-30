<?php

namespace App\Services\Aljabar;

use Throwable;

class GalatRamah
{
    public static function terjemahkan(Throwable $e): string
    {
        $pesan = $e->getMessage();

        if (str_contains($pesan, 'kurung buka')) {
            return 'Tanda kurung buka "(" belum memiliki pasangan tanda kurung tutup ")". Coba periksa kembali.';
        }

        if (str_contains($pesan, 'titik desimal')) {
            return 'Penulisan angka desimal kurang tepat, ada lebih dari satu tanda titik.';
        }

        if (str_contains($pesan, 'tidak digunakan pada soal ini')) {
            return $pesan;
        }

        if (str_contains($pesan, 'Karakter')) {
            return 'Terdapat simbol atau huruf yang tidak dikenal dalam ekspresi matematika.';
        }

        if (str_contains($pesan, 'Pembagian dengan nol')) {
            return 'Pembagian dengan angka 0 tidak dapat dihitung.';
        }

        if (str_contains($pesan, 'Pembagian dengan variabel')) {
            return 'Pada materi ini, pembagian hanya dilakukan dengan angka tetap (bukan dengan huruf).';
        }

        return 'Format ekspresi belum tepat. Coba periksa kembali tanda dan susunan penulisanmu.';
    }
}
