<?php

namespace App\Services\Hint;

use App\Models\SoalKuis;

class FilterKebocoran
{
    /**
     * Memeriksa apakah teks petunjuk AI membocorkan jawaban akhir
     * Mengembalikan TRUE bila respons bocor (mengandung jawaban)
     */
    public static function apakahBocor(string $responsAi, SoalKuis $soal): bool
    {
        $kunci = trim($soal->jawaban_akhir);
        if ($kunci === '') {
            return false;
        }

        $teks = strtolower($responsAi);
        $kunciLower = strtolower($kunci);

        // 1. Cek kecocokan string langsung jika kunci bukan single letter pendek biasa
        if (strlen($kunciLower) > 1 && str_contains($teks, $kunciLower)) {
            return true;
        }

        // 2. Jika kunci berupa bilangan angka
        if (is_numeric($kunci)) {
            // Cek regex batas kata agar angka seperti 13 tidak cocok ke 130
            if (preg_match('/\b' . preg_quote($kunci, '/') . '\b/', $teks)) {
                return true;
            }
        }

        return false;
    }
}
