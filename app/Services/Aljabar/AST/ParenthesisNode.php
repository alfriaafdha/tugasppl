<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Polinom;

class ParenthesisNode implements Node
{
    public function __construct(protected Node $dalam)
    {
    }

    public function getDalam(): Node
    {
        return $this->dalam;
    }

    public function evaluasi(): Polinom
    {
        return $this->dalam->evaluasi();
    }

    public function hasParentheses(): bool
    {
        return true;
    }
}
