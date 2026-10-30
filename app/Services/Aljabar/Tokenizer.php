<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\Exceptions\EkspresiTidakValid;

class Tokenizer
{
    public const T_NUMBER = 'NUMBER';
    public const T_VAR = 'VAR';
    public const T_OP = 'OP';
    public const T_LPAREN = 'LPAREN';
    public const T_RPAREN = 'RPAREN';

    /**
     * @param array<string>|null $variabelDiizinkan
     * @return array<array{type: string, value: string, pos: int}>
     */
    public static function tokenize(string $input, ?array $variabelDiizinkan = null): array
    {
        $input = trim($input);

        if ($input === '') {
            throw new EkspresiTidakValid('Ekspresi matematika tidak boleh kosong.');
        }

        if (strlen($input) > 150) {
            throw new EkspresiTidakValid('Ekspresi terlalu panjang (maksimal 150 karakter).');
        }

        // Normalisasi simbol unicode
        $input = str_replace(
            ['×', '÷', '−', '–', '—', ':'],
            ['*', '/', '-', '-', '-', '/'],
            $input
        );

        $len = strlen($input);
        $tokens = [];
        $i = 0;

        while ($i < $len) {
            $char = $input[$i];

            if (ctype_space($char)) {
                $i++;
                continue;
            }

            if (ctype_digit($char) || ($char === '.' && $i + 1 < $len && ctype_digit($input[$i + 1]))) {
                $num = '';
                $hasDot = false;
                $startPos = $i;

                while ($i < $len && (ctype_digit($input[$i]) || $input[$i] === '.')) {
                    if ($input[$i] === '.') {
                        if ($hasDot) {
                            throw new EkspresiTidakValid("Format angka salah di posisi {$i}: terdapat lebih dari satu titik desimal.");
                        }
                        $hasDot = true;
                    }
                    $num .= $input[$i];
                    $i++;
                }

                $tokens[] = ['type' => self::T_NUMBER, 'value' => $num, 'pos' => $startPos];
                continue;
            }

            if (ctype_alpha($char)) {
                $var = $char;
                $startPos = $i;
                $i++;

                if ($variabelDiizinkan !== null && ! empty($variabelDiizinkan)) {
                    if (! in_array($var, $variabelDiizinkan, true)) {
                        $list = implode(', ', $variabelDiizinkan);
                        throw new EkspresiTidakValid("Variabel '{$var}' tidak digunakan pada soal ini. Gunakan variabel: {$list}.");
                    }
                }

                $tokens[] = ['type' => self::T_VAR, 'value' => $var, 'pos' => $startPos];
                continue;
            }

            if (in_array($char, ['+', '-', '*', '/', '^'], true)) {
                $tokens[] = ['type' => self::T_OP, 'value' => $char, 'pos' => $i];
                $i++;
                continue;
            }

            if ($char === '(') {
                $tokens[] = ['type' => self::T_LPAREN, 'value' => '(', 'pos' => $i];
                $i++;
                continue;
            }

            if ($char === ')') {
                $tokens[] = ['type' => self::T_RPAREN, 'value' => ')', 'pos' => $i];
                $i++;
                continue;
            }

            throw new EkspresiTidakValid("Karakter '{$char}' tidak valid dalam ekspresi matematika.");
        }

        return $tokens;
    }
}
