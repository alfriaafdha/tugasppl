<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Exceptions\EkspresiTidakValid;
use App\Services\Aljabar\Polinom;

class PowerNode implements Node
{
    public function __construct(
        protected Node $basis,
        protected int $eksponen
    ) {
    }

    public function getBasis(): Node
    {
        return $this->basis;
    }

    public function getEksponen(): int
    {
        return $this->eksponen;
    }

    public function evaluasi(): Polinom
    {
        if ($this->eksponen < 0) {
            throw new EkspresiTidakValid('Eksponen negatif belum didukung.');
        }

        $basisPoly = $this->basis->evaluasi();
        return $basisPoly->pangkat($this->eksponen);
    }

    public function hasParentheses(): bool
    {
        return $this->basis->hasParentheses();
    }
}
