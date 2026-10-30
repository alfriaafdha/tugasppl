<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Pecahan;
use App\Services\Aljabar\Polinom;

class UnaryOpNode implements Node
{
    public function __construct(
        protected string $operator,
        protected Node $ekspresi
    ) {
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getEkspresi(): Node
    {
        return $this->ekspresi;
    }

    public function evaluasi(): Polinom
    {
        $poly = $this->ekspresi->evaluasi();
        if ($this->operator === '-') {
            return $poly->kaliKonstanta(new Pecahan(-1, 1));
        }
        return $poly;
    }

    public function hasParentheses(): bool
    {
        return $this->ekspresi->hasParentheses();
    }
}
