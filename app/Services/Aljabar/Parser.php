<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\AST\BinaryOpNode;
use App\Services\Aljabar\AST\Node;
use App\Services\Aljabar\AST\NumberNode;
use App\Services\Aljabar\AST\ParenthesisNode;
use App\Services\Aljabar\AST\PowerNode;
use App\Services\Aljabar\AST\UnaryOpNode;
use App\Services\Aljabar\AST\VariableNode;
use App\Services\Aljabar\Exceptions\EkspresiTidakValid;

class Parser
{
    /** @var array<array{type: string, value: string, pos: int}> */
    protected array $tokens;
    protected int $pos = 0;
    protected int $tokenCount;

    public function __construct(array $tokens)
    {
        $this->tokens = $tokens;
        $this->tokenCount = count($tokens);
    }

    public static function parse(string $ekspresi, ?array $variabelDiizinkan = null): Node
    {
        $tokens = Tokenizer::tokenize($ekspresi, $variabelDiizinkan);
        $parser = new self($tokens);
        $node = $parser->parseEkspresi();

        if (! $parser->isEof()) {
            $currentToken = $parser->current();
            throw new EkspresiTidakValid("Sintaks tidak valid di dekat '{$currentToken['value']}'.");
        }

        return $node;
    }

    protected function isEof(): bool
    {
        return $this->pos >= $this->tokenCount;
    }

    protected function current(): ?array
    {
        return $this->tokens[$this->pos] ?? null;
    }

    protected function peek(): ?array
    {
        return $this->tokens[$this->pos + 1] ?? null;
    }

    protected function advance(): ?array
    {
        $t = $this->current();
        $this->pos++;
        return $t;
    }

    protected function match(string $type, ?string $value = null): bool
    {
        $cur = $this->current();
        if ($cur === null || $cur['type'] !== $type) {
            return false;
        }
        if ($value !== null && $cur['value'] !== $value) {
            return false;
        }
        return true;
    }

    public function parseEkspresi(): Node
    {
        $node = $this->parseTerm();

        while (! $this->isEof() && $this->match(Tokenizer::T_OP) && in_array($this->current()['value'], ['+', '-'], true)) {
            $op = $this->advance()['value'];
            $kanan = $this->parseTerm();
            $node = new BinaryOpNode($op, $node, $kanan);
        }

        return $node;
    }

    protected function parseTerm(): Node
    {
        $node = $this->parsePower();

        while (! $this->isEof()) {
            if ($this->match(Tokenizer::T_OP) && in_array($this->current()['value'], ['*', '/'], true)) {
                $op = $this->advance()['value'];
                $kanan = $this->parsePower();
                $node = new BinaryOpNode($op, $node, $kanan);
            } elseif ($this->canBeImplicitMultiplication()) {
                // Perkalian tersirat (misal: 3x, 4(x+2), xy, (a+b)(c+d))
                $kanan = $this->parsePower();
                $node = new BinaryOpNode('*', $node, $kanan);
            } else {
                break;
            }
        }

        return $node;
    }

    protected function canBeImplicitMultiplication(): bool
    {
        $cur = $this->current();
        if ($cur === null) {
            return false;
        }

        // Perkalian tersirat terjadi jika token berikutnya adalah:
        // - Variabel (misal setelah angka: 3x)
        // - Kurung buka (misal setelah angka: 2(x+1) atau setelah kurung tutup)
        // - Angka setelah kurung tutup: (x+1)2
        return $cur['type'] === Tokenizer::T_VAR
            || $cur['type'] === Tokenizer::T_LPAREN;
    }

    protected function parsePower(): Node
    {
        $node = $this->parsePrimary();

        if (! $this->isEof() && $this->match(Tokenizer::T_OP, '^')) {
            $this->advance(); // lewati '^'
            $eksponenNode = $this->parsePrimary();

            if (! $eksponenNode instanceof NumberNode || ! $eksponenNode->getNilai()->isBulat()) {
                throw new EkspresiTidakValid('Eksponen pada pangkat harus berupa bilangan bulat.');
            }

            $eksponen = $eksponenNode->getNilai()->getPembilang();
            if ($eksponen < 0) {
                throw new EkspresiTidakValid('Pangkat negatif belum didukung.');
            }

            $node = new PowerNode($node, $eksponen);
        }

        return $node;
    }

    protected function parsePrimary(): Node
    {
        if ($this->isEof()) {
            throw new EkspresiTidakValid('Ekspresi matematika belum selesai.');
        }

        // Unary operator: + atau -
        if ($this->match(Tokenizer::T_OP) && in_array($this->current()['value'], ['+', '-'], true)) {
            $op = $this->advance()['value'];
            $node = $this->parsePrimary();
            return new UnaryOpNode($op, $node);
        }

        if ($this->match(Tokenizer::T_NUMBER)) {
            $val = $this->advance()['value'];
            return new NumberNode(Pecahan::dariString($val));
        }

        if ($this->match(Tokenizer::T_VAR)) {
            $nama = $this->advance()['value'];
            return new VariableNode($nama);
        }

        if ($this->match(Tokenizer::T_LPAREN)) {
            $this->advance(); // lewati '('
            $dalam = $this->parseEkspresi();

            if (! $this->match(Tokenizer::T_RPAREN)) {
                throw new EkspresiTidakValid('Tanda kurung buka "(" belum ditutup dengan ")".');
            }
            $this->advance(); // lewati ')'

            return new ParenthesisNode($dalam);
        }

        $cur = $this->current();
        throw new EkspresiTidakValid("Sintaks tidak diharapkan di dekat '{$cur['value']}'.");
    }
}
