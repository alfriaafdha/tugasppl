<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Polinom;

interface Node
{
    public function evaluasi(): Polinom;

    public function hasParentheses(): bool;
}
