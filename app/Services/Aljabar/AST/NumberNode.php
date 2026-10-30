<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Pecahan;
use App\Services\Aljabar\Polinom;

class NumberNode implements Node
{
    public function __construct(protected Pecahan $nilai)
    {
    }

    public function getNilai(): Pecahan
    {
        return $this->nilai;
    }

    public function evaluasi(): Polinom
    {
        return Polinom::konstanta($this->nilai);
    }

    public function hasParentheses(): bool
    {
        return false;
    }
}
