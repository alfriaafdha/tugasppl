<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\Exceptions\EkspresiTidakValid;

class Pecahan
{
    protected int $pembilang;
    protected int $penyebut;

    public function __construct(int $pembilang = 0, int $penyebut = 1)
    {
        if ($penyebut === 0) {
            throw new EkspresiTidakValid('Pembagian dengan nol tidak diperbolehkan.');
        }

        if ($penyebut < 0) {
            $pembilang = -$pembilang;
            $penyebut = -$penyebut;
        }

        $fpb = self::hitungFpb(abs($pembilang), $penyebut);
        $this->pembilang = intdiv($pembilang, $fpb);
        $this->penyebut = intdiv($penyebut, $fpb);
    }

    public static function dariString(string $input): self
    {
        $input = trim($input);

        if (str_contains($input, '/')) {
            $parts = explode('/', $input);
            if (count($parts) === 2 && is_numeric($parts[0]) && is_numeric($parts[1])) {
                return new self((int) $parts[0], (int) $parts[1]);
            }
        }

        if (is_numeric($input)) {
            if (str_contains($input, '.')) {
                $decPlaces = strlen(substr(strrchr($input, '.'), 1));
                $multiplier = 10 ** $decPlaces;
                return new self((int) round((float) $input * $multiplier), $multiplier);
            }
            return new self((int) $input, 1);
        }

        throw new EkspresiTidakValid("Format angka tidak valid: {$input}");
    }

    public static function dariBilangan(int|float $angka): self
    {
        if (is_int($angka)) {
            return new self($angka, 1);
        }
        return self::dariString((string) $angka);
    }

    public static function hitungFpb(int $a, int $b): int
    {
        while ($b !== 0) {
            $t = $b;
            $b = $a % $b;
            $a = $t;
        }
        return $a > 0 ? $a : 1;
    }

    public function getPembilang(): int
    {
        return $this->pembilang;
    }

    public function getPenyebut(): int
    {
        return $this->penyebut;
    }

    public function isNol(): bool
    {
        return $this->pembilang === 0;
    }

    public function isBulat(): bool
    {
        return $this->penyebut === 1;
    }

    public function isPositif(): bool
    {
        return $this->pembilang > 0;
    }

    public function isNegatif(): bool
    {
        return $this->pembilang < 0;
    }

    public function tambah(self $lain): self
    {
        $p = ($this->pembilang * $lain->penyebut) + ($lain->pembilang * $this->penyebut);
        $q = $this->penyebut * $lain->penyebut;
        return new self($p, $q);
    }

    public function kurang(self $lain): self
    {
        $p = ($this->pembilang * $lain->penyebut) - ($lain->pembilang * $this->penyebut);
        $q = $this->penyebut * $lain->penyebut;
        return new self($p, $q);
    }

    public function kali(self $lain): self
    {
        return new self($this->pembilang * $lain->pembilang, $this->penyebut * $lain->penyebut);
    }

    public function bagi(self $lain): self
    {
        if ($lain->isNol()) {
            throw new EkspresiTidakValid('Pembagian dengan nol tidak diperbolehkan.');
        }
        return new self($this->pembilang * $lain->penyebut, $this->penyebut * $lain->pembilang);
    }

    public function pangkat(int $exp): self
    {
        if ($exp === 0) {
            return new self(1, 1);
        }
        if ($exp > 0) {
            return new self($this->pembilang ** $exp, $this->penyebut ** $exp);
        }
        if ($this->isNol()) {
            throw new EkspresiTidakValid('Pangkat negatif dari nol tidak terdefinisi.');
        }
        return new self($this->penyebut ** (-$exp), $this->pembilang ** (-$exp));
    }

    public function samaDengan(self $lain): bool
    {
        return $this->pembilang === $lain->pembilang && $this->penyebut === $lain->penyebut;
    }

    public function toFloat(): float
    {
        return $this->pembilang / $this->penyebut;
    }

    public function __toString(): string
    {
        if ($this->penyebut === 1) {
            return (string) $this->pembilang;
        }
        return "{$this->pembilang}/{$this->penyebut}";
    }
}
