<?php

namespace App\Services\Aljabar;

use App\Services\Aljabar\AST\ParenthesisNode;
use App\Services\Aljabar\AST\BinaryOpNode;
use App\Services\Aljabar\AST\NumberNode;
use App\Services\Aljabar\AST\Node;
use App\Services\Aljabar\AST\UnaryOpNode;
use App\Services\Aljabar\Pecahan;
use Throwable;

class BentukAkhir
{
    /**
     * Memeriksa apakah baris akhir siswa memenuhi syarat jawaban akhir sesuai tipe soal
     *
     * @return array{cocok: bool, pesan: string}
     */
    public static function periksa(
        string $tipe,
        string $inputSiswa,
        string $jawabanAkhir,
        ?string $ekspresiAwal = null,
        ?string $nilaiVariabel = null,
        ?array $variabelDiizinkan = null
    ): array {
        $inputSiswa = trim($inputSiswa);
        $jawabanAkhir = trim($jawabanAkhir);

        if ($inputSiswa === '') {
            return ['cocok' => false, 'pesan' => 'Jawaban tidak boleh kosong.'];
        }

        return match ($tipe) {
            'unsur' => self::periksaUnsur($inputSiswa, $jawabanAkhir),
            'substitusi' => self::periksaSubstitusi($inputSiswa, $jawabanAkhir),
            'model' => self::periksaModel($inputSiswa, $jawabanAkhir, $variabelDiizinkan),
            'sederhanakan' => self::periksaSederhanakan($inputSiswa, $jawabanAkhir, $variabelDiizinkan),
            'jabarkan' => self::periksaJabarkan($inputSiswa, $jawabanAkhir, $variabelDiizinkan),
            'faktorkan' => self::periksaFaktorkan($inputSiswa, $jawabanAkhir, $variabelDiizinkan),
            default => self::periksaEkuivalenUmum($inputSiswa, $jawabanAkhir, $variabelDiizinkan),
        };
    }

    protected static function periksaUnsur(string $input, string $kunci): array
    {
        $inputNorm = strtolower(trim($input));
        $kunciNorm = strtolower(trim($kunci));

        // Bersihkan tanda plus awalan jika ada
        if (str_starts_with($inputNorm, '+')) {
            $inputNorm = substr($inputNorm, 1);
        }
        if (str_starts_with($kunciNorm, '+')) {
            $kunciNorm = substr($kunciNorm, 1);
        }

        if ($inputNorm === $kunciNorm) {
            return ['cocok' => true, 'pesan' => 'Jawaban benar!'];
        }

        return ['cocok' => false, 'pesan' => 'Jawaban belum tepat. Periksa kembali unsur yang ditanyakan.'];
    }

    protected static function periksaSubstitusi(string $input, string $kunci): array
    {
        try {
            if (preg_match('/[a-zA-Z]/', $input)) {
                return ['cocok' => false, 'pesan' => 'Hasil akhir harus berupa bilangan angka, tanpa huruf variabel.'];
            }

            $polyInput = Normalisasi::kePolinom($input);
            $polyKunci = Normalisasi::kePolinom($kunci);

            if ($polyInput->samaDengan($polyKunci)) {
                return ['cocok' => true, 'pesan' => 'Hasil substitusi dan perhitungan benar!'];
            }

            return ['cocok' => false, 'pesan' => 'Hasil akhir hitungan belum tepat. Coba periksa kembali.'];
        } catch (Throwable) {
            return ['cocok' => false, 'pesan' => 'Format angka belum tepat.'];
        }
    }

    protected static function periksaModel(string $input, string $kunci, ?array $vars = null): array
    {
        if (CekEkuivalen::apakahEkuivalen($input, $kunci, $vars)) {
            return ['cocok' => true, 'pesan' => 'Bentuk aljabar pemodelan benar!'];
        }

        return [
            'cocok' => false,
            'pesan' => 'Bentuk aljabar yang kamu susun belum tepat. Perhatikan kembali kata kunci cerita dan satuannya.',
        ];
    }

    protected static function periksaSederhanakan(string $input, string $kunci, ?array $vars = null): array
    {
        try {
            $ast = Parser::parse($input, $vars);

            // Cek apakah masih ada tanda kurung
            if ($ast->hasParentheses()) {
                return [
                    'cocok' => false,
                    'pesan' => 'Bentuk belum paling sederhana: jabarkan tanda kurung terlebih dahulu.',
                ];
            }

            if (self::punyaSukuSejenis($ast)) {
                return [
                    'cocok' => false,
                    'pesan' => 'Masih ada suku sejenis yang bisa digabung. Gabungkan suku dengan huruf yang sama terlebih dahulu.',
                ];
            }

            $polyInput = $ast->evaluasi();
            $polyKunci = Normalisasi::kePolinom($kunci, $vars);

            if (! $polyInput->samaDengan($polyKunci)) {
                return [
                    'cocok' => false,
                    'pesan' => 'Bentuk belum ekuivalen dengan ekspresi awal. Coba periksa perhitungan tanda dan koefisiennya.',
                ];
            }

            return ['cocok' => true, 'pesan' => 'Bentuk aljabar berhasil disederhanakan dengan benar!'];
        } catch (Throwable $e) {
            return ['cocok' => false, 'pesan' => 'Format ekspresi tidak valid: ' . $e->getMessage()];
        }
    }

    protected static function periksaJabarkan(string $input, string $kunci, ?array $vars = null): array
    {
        try {
            $ast = Parser::parse($input, $vars);

            if ($ast->hasParentheses()) {
                return [
                    'cocok' => false,
                    'pesan' => 'Bentuk belum dijabarkan: hilangkan tanda kurung menggunakan sifat distributif.',
                ];
            }

            $polyInput = $ast->evaluasi();
            $polyKunci = Normalisasi::kePolinom($kunci, $vars);

            if (! $polyInput->samaDengan($polyKunci)) {
                return [
                    'cocok' => false,
                    'pesan' => 'Penjabaran belum tepat. Pastikan bilangan di luar kurung mengalikan semua suku di dalam kurung.',
                ];
            }

            return ['cocok' => true, 'pesan' => 'Bentuk aljabar berhasil dijabarkan dengan benar!'];
        } catch (Throwable $e) {
            return ['cocok' => false, 'pesan' => 'Format ekspresi tidak valid: ' . $e->getMessage()];
        }
    }

    protected static function periksaFaktorkan(string $input, string $kunci, ?array $vars = null): array
    {
        try {
            $ast = Parser::parse($input, $vars);

            $bentukFaktor = self::ambilBentukFaktor($ast);
            if ($bentukFaktor === null) {
                return [
                    'cocok' => false,
                    'pesan' => 'Bentuk faktor harus memuat tanda kurung perkalian, contoh: 4(x + 2).',
                ];
            }

            $polyInput = $ast->evaluasi();
            $polyKunci = Normalisasi::kePolinom($kunci, $vars);

            if (! $polyInput->samaDengan($polyKunci)) {
                return [
                    'cocok' => false,
                    'pesan' => 'Bentuk faktor belum ekuivalen. Coba periksa kembali faktor yang dikeluarkan di depan kurung.',
                ];
            }

            [$faktorLuar, $isiKurung] = $bentukFaktor;
            $faktorBulat = $faktorLuar->isBulat() ? abs($faktorLuar->getPembilang()) : 0;
            $faktorTerbesar = $polyKunci->fpbKoefisien();

            if ($faktorBulat !== $faktorTerbesar || $isiKurung->fpbKoefisien() !== 1) {
                return [
                    'cocok' => false,
                    'pesan' => 'Faktor persekutuan terbesar belum dikeluarkan semuanya. Periksa kembali faktor di depan kurung.',
                ];
            }

            return ['cocok' => true, 'pesan' => 'Pemfaktoran benar dengan faktor persekutuan terbesar!'];
        } catch (Throwable $e) {
            return ['cocok' => false, 'pesan' => 'Format ekspresi tidak valid: ' . $e->getMessage()];
        }
    }

    protected static function periksaEkuivalenUmum(string $input, string $kunci, ?array $vars = null): array
    {
        if (CekEkuivalen::apakahEkuivalen($input, $kunci, $vars)) {
            return ['cocok' => true, 'pesan' => 'Jawaban benar!'];
        }

        return ['cocok' => false, 'pesan' => 'Jawaban belum tepat. Coba periksa kembali langkah perhitunganmu.'];
    }

    /** @return array{Pecahan, Polinom}|null */
    protected static function ambilBentukFaktor(Node $ast): ?array
    {
        if (! $ast instanceof BinaryOpNode || $ast->getOperator() !== '*') {
            return null;
        }

        $faktor = self::ambilBilangan($ast->getKiri());
        $kurung = $ast->getKanan();

        if ($faktor === null || ! $kurung instanceof ParenthesisNode) {
            $faktor = self::ambilBilangan($ast->getKanan());
            $kurung = $ast->getKiri();
        }

        if ($faktor === null || ! $kurung instanceof ParenthesisNode) {
            return null;
        }

        return [$faktor, $kurung->getDalam()->evaluasi()];
    }

    protected static function ambilBilangan(Node $node): ?Pecahan
    {
        if ($node instanceof NumberNode) {
            return $node->getNilai();
        }

        if ($node instanceof UnaryOpNode && $node->getEkspresi() instanceof NumberNode) {
            $nilai = $node->getEkspresi()->getNilai();
            return $node->getOperator() === '-'
                ? new Pecahan(-$nilai->getPembilang(), $nilai->getPenyebut())
                : $nilai;
        }

        return null;
    }

    protected static function punyaSukuSejenis(Node $ast): bool
    {
        $sukuDilihat = [];
        $tumpukan = [];
        self::kumpulkanSukuTambah($ast, $tumpukan);

        foreach ($tumpukan as $bagian) {
            foreach ($bagian->evaluasi()->getSuku() as $monomial => $_koefisien) {
                if (isset($sukuDilihat[$monomial])) {
                    return true;
                }
                $sukuDilihat[$monomial] = true;
            }
        }

        return false;
    }

    /** @param list<Node> $tumpukan */
    protected static function kumpulkanSukuTambah(Node $node, array &$tumpukan): void
    {
        if ($node instanceof BinaryOpNode && in_array($node->getOperator(), ['+', '-'], true)) {
            self::kumpulkanSukuTambah($node->getKiri(), $tumpukan);
            self::kumpulkanSukuTambah($node->getKanan(), $tumpukan);
            return;
        }

        if ($node instanceof UnaryOpNode) {
            self::kumpulkanSukuTambah($node->getEkspresi(), $tumpukan);
            return;
        }

        $tumpukan[] = $node;
    }
}
