<?php

namespace App\Services\Aljabar;

class Normalisasi
{
    /**
     * Mengubah string ekspresi aljabar menjadi bentuk Polinom kanonik
     */
    public static function kePolinom(string $ekspresi, ?array $variabelDiizinkan = null): Polinom
    {
        $ast = Parser::parse($ekspresi, $variabelDiizinkan);
        return $ast->evaluasi();
    }
}
