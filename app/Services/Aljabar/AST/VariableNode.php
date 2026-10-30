<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Polinom;

class VariableNode implements Node
{
    public function __construct(protected string $nama)
    {
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function evaluasi(): Polinom
    {
        return Polinom::variabel($this->nama);
    }

    public function hasParentheses(): bool
    {
        return false;
    }
}
