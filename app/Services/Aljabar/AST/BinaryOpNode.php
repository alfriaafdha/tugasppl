<?php

namespace App\Services\Aljabar\AST;

use App\Services\Aljabar\Exceptions\BelumDidukung;
use App\Services\Aljabar\Exceptions\EkspresiTidakValid;
use App\Services\Aljabar\Polinom;

class BinaryOpNode implements Node
{
    public function __construct(
        protected string $operator,
        protected Node $kiri,
        protected Node $kanan
    ) {
    }

    public function getOperator(): string
    {
        return $this->operator;
    }

    public function getKiri(): Node
    {
        return $this->kiri;
    }

    public function getKanan(): Node
    {
        return $this->kanan;
    }

    public function evaluasi(): Polinom
    {
        $kiriPoly = $this->kiri->evaluasi();
        $kananPoly = $this->kanan->evaluasi();

        return match ($this->operator) {
            '+' => $kiriPoly->tambah($kananPoly),
            '-' => $kiriPoly->kurang($kananPoly),
            '*' => $kiriPoly->kali($kananPoly),
            '/' => $this->evaluasiBagi($kiriPoly, $kananPoly),
            default => throw new EkspresiTidakValid("Operator {$this->operator} tidak dikenal."),
        };
    }

    protected function evaluasiBagi(Polinom $kiri, Polinom $kanan): Polinom
    {
        if ($kanan->isNol()) {
            throw new EkspresiTidakValid('Pembagian dengan nol tidak diperbolehkan.');
        }

        if (! $kanan->isKonstanta()) {
            throw new BelumDidukung('Pembagian dengan variabel belum didukung pada materi ini.');
        }

        return $kiri->bagiKonstanta($kanan->getKonstanta());
    }

    public function hasParentheses(): bool
    {
        return $this->kiri->hasParentheses() || $this->kanan->hasParentheses();
    }
}
