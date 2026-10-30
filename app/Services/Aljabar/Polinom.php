<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\Exceptions\EkspresiTidakValid;

class Polinom
{
    /**
     * @var array<string, Pecahan> Key: serialized monomial, Value: coefficient
     */
    protected array $suku = [];

    /**
     * @param array<string, Pecahan> $suku
     */
    public function __construct(array $suku = [])
    {
        foreach ($suku as $k => $koef) {
            if (! $koef->isNol()) {
                $this->suku[$k] = $koef;
            }
        }
    }

    public static function nol(): self
    {
        return new self([]);
    }

    public static function konstanta(Pecahan $nilai): self
    {
        if ($nilai->isNol()) {
            return new self([]);
        }
        return new self(['' => $nilai]);
    }

    public static function variabel(string $nama, int $pangkat = 1, ?Pecahan $koef = null): self
    {
        $koef = $koef ?? new Pecahan(1, 1);
        if ($koef->isNol() || $pangkat === 0) {
            return self::konstanta($koef);
        }

        $k = self::buatKey([$nama => $pangkat]);
        return new self([$k => $koef]);
    }

    /**
     * @param array<string, int> $vars
     */
    public static function buatKey(array $vars): string
    {
        ksort($vars);
        $parts = [];
        foreach ($vars as $v => $p) {
            if ($p > 0) {
                $parts[] = "{$v}^{$p}";
            }
        }
        return implode('*', $parts);
    }

    /**
     * @return array<string, int>
     */
    public static function parseKey(string $key): array
    {
        if ($key === '') {
            return [];
        }
        $res = [];
        $parts = explode('*', $key);
        foreach ($parts as $p) {
            if (str_contains($p, '^')) {
                [$v, $exp] = explode('^', $p);
                $res[$v] = (int) $exp;
            } else {
                $res[$p] = 1;
            }
        }
        return $res;
    }

    public function tambah(self $lain): self
    {
        $hasil = $this->suku;

        foreach ($lain->suku as $k => $koef) {
            if (isset($hasil[$k])) {
                $baru = $hasil[$k]->tambah($koef);
                if ($baru->isNol()) {
                    unset($hasil[$k]);
                } else {
                    $hasil[$k] = $baru;
                }
            } else {
                $hasil[$k] = $koef;
            }
        }

        return new self($hasil);
    }

    public function kurang(self $lain): self
    {
        $negatif = $lain->kaliKonstanta(new Pecahan(-1, 1));
        return $this->tambah($negatif);
    }

    public function kaliKonstanta(Pecahan $c): self
    {
        if ($c->isNol()) {
            return self::nol();
        }

        $hasil = [];
        foreach ($this->suku as $k => $koef) {
            $hasil[$k] = $koef->kali($c);
        }
        return new self($hasil);
    }

    public function bagiKonstanta(Pecahan $c): self
    {
        if ($c->isNol()) {
            throw new EkspresiTidakValid('Pembagian dengan nol.');
        }

        $hasil = [];
        foreach ($this->suku as $k => $koef) {
            $hasil[$k] = $koef->bagi($c);
        }
        return new self($hasil);
    }

    public function kali(self $lain): self
    {
        $hasil = [];

        foreach ($this->suku as $k1 => $koef1) {
            $vars1 = self::parseKey($k1);
            foreach ($lain->suku as $k2 => $koef2) {
                $vars2 = self::parseKey($k2);

                // Gabungkan variabel
                $varsGabung = $vars1;
                foreach ($vars2 as $v => $p) {
                    $varsGabung[$v] = ($varsGabung[$v] ?? 0) + $p;
                }

                $keyGabung = self::buatKey($varsGabung);
                $koefKali = $koef1->kali($koef2);

                if (isset($hasil[$keyGabung])) {
                    $hasil[$keyGabung] = $hasil[$keyGabung]->tambah($koefKali);
                    if ($hasil[$keyGabung]->isNol()) {
                        unset($hasil[$keyGabung]);
                    }
                } else {
                    $hasil[$keyGabung] = $koefKali;
                }
            }
        }

        return new self($hasil);
    }

    public function pangkat(int $exp): self
    {
        if ($exp < 0) {
            throw new EkspresiTidakValid('Pangkat negatif bentuk aljabar belum didukung.');
        }
        if ($exp === 0) {
            return self::konstanta(new Pecahan(1, 1));
        }

        $hasil = $this;
        for ($i = 1; $i < $exp; $i++) {
            $hasil = $hasil->kali($this);
        }
        return $hasil;
    }

    public function samaDengan(self $lain): bool
    {
        if (count($this->suku) !== count($lain->suku)) {
            return false;
        }

        foreach ($this->suku as $k => $koef) {
            if (! isset($lain->suku[$k])) {
                return false;
            }
            if (! $koef->samaDengan($lain->suku[$k])) {
                return false;
            }
        }

        return true;
    }

    public function isNol(): bool
    {
        return empty($this->suku);
    }

    public function isKonstanta(): bool
    {
        if ($this->isNol()) {
            return true;
        }
        return count($this->suku) === 1 && isset($this->suku['']);
    }

    public function getKonstanta(): Pecahan
    {
        return $this->suku[''] ?? new Pecahan(0, 1);
    }

    public function getSuku(): array
    {
        return $this->suku;
    }

    public function getJumlahSuku(): int
    {
        return count($this->suku);
    }

    /**
     * Menghitung FPB dari semua koefisien bulat
     */
    public function fpbKoefisien(): int
    {
        if (empty($this->suku)) {
            return 1;
        }

        $fpb = 0;
        foreach ($this->suku as $koef) {
            if (! $koef->isBulat()) {
                return 1; // Pecahan, FPB non-trivial tidak dicari
            }
            $val = abs($koef->getPembilang());
            if ($val === 0) {
                continue;
            }
            $fpb = ($fpb === 0) ? $val : Pecahan::hitungFpb($fpb, $val);
        }

        return $fpb > 0 ? $fpb : 1;
    }

    public function toString(): string
    {
        if ($this->isNol()) {
            return '0';
        }

        $parts = [];
        foreach ($this->suku as $k => $koef) {
            $pemb = $koef->getPembilang();
            $peny = $koef->getPenyebut();

            $tanda = ($pemb < 0) ? '-' : '+';
            $absPemb = abs($pemb);

            $koefStr = ($peny === 1) ? (string) $absPemb : "{$absPemb}/{$peny}";

            if ($k === '') {
                $str = $koefStr;
            } else {
                $varStr = str_replace('*', '', $k);
                $varStr = preg_replace('/\^1(?![0-9])/', '', $varStr);
                if ($koefStr === '1') {
                    $str = $varStr;
                } else {
                    $str = "{$koefStr}{$varStr}";
                }
            }

            $parts[] = ['tanda' => $tanda, 'teks' => $str];
        }

        $out = '';
        foreach ($parts as $idx => $p) {
            if ($idx === 0) {
                $out .= ($p['tanda'] === '-') ? "-{$p['teks']}" : $p['teks'];
            } else {
                $out .= " {$p['tanda']} {$p['teks']}";
            }
        }

        return $out;
    }
}
