<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\Exceptions\EkspresiTidakValid;
use Throwable;

class NilaiSubstitusi
{
    /**
     * Parse string nilai variabel (contoh: "p=4" atau "x=5,y=2")
     * @return array<string, Pecahan>
     */
    public static function parseNilaiVariabel(?string $str): array
    {
        if (empty($str)) {
            return [];
        }

        $hasil = [];
        $pairs = explode(',', $str);

        foreach ($pairs as $p) {
            $p = trim($p);
            if (str_contains($p, '=')) {
                [$var, $val] = explode('=', $p, 2);
                $hasil[trim($var)] = Pecahan::dariString(trim($val));
            }
        }

        return $hasil;
    }

    /**
     * Hitung nilai angka dari ekspresi aljabar setelah variabel disubstitusi
     */
    public static function hitung(string $ekspresiAwal, ?string $nilaiVariabelStr): Pecahan
    {
        $petaNilai = self::parseNilaiVariabel($nilaiVariabelStr);

        // Ubah variabel dalam ekspresi awal dengan nilai angka
        $ast = Parser::parse($ekspresiAwal);
        $poly = $ast->evaluasi();

        // Evaluasi Polinom dengan nilai variabel
        $total = new Pecahan(0, 1);

        foreach ($poly->getSuku() as $key => $koef) {
            $sukuNilai = $koef;
            $vars = Polinom::parseKey($key);

            foreach ($vars as $v => $exp) {
                if (! isset($petaNilai[$v])) {
                    throw new EkspresiTidakValid("Nilai untuk variabel '{$v}' belum ditentukan.");
                }
                $varVal = $petaNilai[$v]->pangkat($exp);
                $sukuNilai = $sukuNilai->kali($varVal);
            }

            $total = $total->tambah($sukuNilai);
        }

        return $total;
    }

    /**
     * Memeriksa apakah baris siswa valid untuk soal substitusi:
     * - Baris tidak boleh mengandung huruf variabel
     * - Nilai numerik baris harus sama dengan nilai hasil substitusi ekspresi awal
     */
    public static function cekBarisSubstitusi(string $inputSiswa, string $ekspresiAwal, ?string $nilaiVariabelStr): array
    {
        try {
            // Cek apakah ada huruf
            if (preg_match('/[a-zA-Z]/', $inputSiswa)) {
                return [
                    'benar' => false,
                    'pesan' => 'Pada soal substitusi, ganti semua huruf variabel dengan angka sebelum menghitung.',
                ];
            }

            // Hitung nilai input siswa
            $astInput = Parser::parse($inputSiswa);
            $polyInput = $astInput->evaluasi();

            if (! $polyInput->isKonstanta()) {
                return [
                    'benar' => false,
                    'pesan' => 'Baris harus berupa perhitungan bilangan angka.',
                ];
            }

            $nilaiInput = $polyInput->getKonstanta();
            $nilaiTarget = self::hitung($ekspresiAwal, $nilaiVariabelStr);

            if ($nilaiInput->samaDengan($nilaiTarget)) {
                return [
                    'benar' => true,
                    'pesan' => 'Langkah benar! Nilai hitungan sesuai.',
                ];
            }

            return [
                'benar' => false,
                'pesan' => 'Perhitungan belum tepat. Coba periksa kembali urutan operasi perkalian atau penjumlahannya.',
            ];
        } catch (Throwable $e) {
            return [
                'benar' => false,
                'pesan' => 'Format perhitungan tidak valid: ' . $e->getMessage(),
            ];
        }
    }
}
