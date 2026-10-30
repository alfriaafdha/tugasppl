<?php

namespace App\Services\Aljabar;

use Throwable;

class CekEkuivalen
{
    /**
     * Memeriksa apakah dua ekspresi ekuivalen secara matematis
     */
    public static function apakahEkuivalen(string $ekspresi1, string $ekspresi2, ?array $variabelDiizinkan = null): bool
    {
        try {
            $p1 = Normalisasi::kePolinom($ekspresi1, $variabelDiizinkan);
            $p2 = Normalisasi::kePolinom($ekspresi2, $variabelDiizinkan);

            return $p1->samaDengan($p2);
        } catch (Throwable) {
            return false;
        }
    }
}
