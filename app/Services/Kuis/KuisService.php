<?php

namespace App\Services\Kuis;

use App\Models\Kuis;
use App\Models\LangkahKuis;
use App\Models\Pengguna;
use App\Models\SesiKuis;
use App\Models\SoalKuis;
use App\Services\Aljabar\BentukAkhir;
use App\Services\Aljabar\CekEkuivalen;
use App\Services\Aljabar\GalatRamah;
use App\Services\Aljabar\NilaiSubstitusi;
use App\Services\Aljabar\UmpanBalikKesalahan;
use App\Services\Progres\ProgresService;
use Throwable;

class KuisService
{
    public function __construct(protected ProgresService $progresService)
    {
    }

    /**
     * Mengambil sesi kuis yang sedang berlangsung atau membuat sesi percobaan baru
     */
    public function ambilAtauMulaiSesi(Pengguna $siswa, Kuis $kuis, bool $buatBaru = false): SesiKuis
    {
        if (! $buatBaru) {
            $sesiAktif = SesiKuis::where('pengguna_id', $siswa->id)
                ->where('kuis_id', $kuis->id)
                ->where('status', 'berlangsung')
                ->latest('id')
                ->first();

            if ($sesiAktif) {
                return $sesiAktif;
            }
        }

        $percobaanTerakhir = (int) SesiKuis::where('pengguna_id', $siswa->id)
            ->where('kuis_id', $kuis->id)
            ->max('percobaan_ke');

        return SesiKuis::create([
            'pengguna_id' => $siswa->id,
            'kuis_id' => $kuis->id,
            'percobaan_ke' => $percobaanTerakhir + 1,
            'status' => 'berlangsung',
            'waktu_mulai' => now(),
            'jumlah_hint_ai' => 0,
            'jumlah_soal_dikumpulkan' => 0,
        ]);
    }

    /**
     * Mengambil nomor soal yang sedang aktif dikerjakan pada sesi ini (1 - 5)
     */
    public function nomorSoalAktif(SesiKuis $sesi): int
    {
        return min(5, $sesi->jumlah_soal_dikumpulkan + 1);
    }

    /**
     * Memeriksa apakah soal dengan nomor tertentu dapat diakses
     */
    public function bolehAksesSoal(SesiKuis $sesi, int $nomorSoal): bool
    {
        if ($sesi->status === 'selesai') {
            return true; // Mode baca-saja
        }

        return $nomorSoal === $this->nomorSoalAktif($sesi);
    }

    /** Benar saat batas langkah tercapai atau jawaban akhir sudah dikunci. */
    public function langkahSudahSelesai(SesiKuis $sesi, SoalKuis $soal): bool
    {
        if ($soal->mode !== 'langkah') {
            return false;
        }

        $langkahBenar = LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->where('status_benar', true)
            ->where('dikumpulkan', false);

        if ($soal->jumlah_langkah !== null && (clone $langkahBenar)->count() >= $soal->jumlah_langkah) {
            return true;
        }

        $langkahTerakhir = $langkahBenar->latest('nomor_baris')->first();
        if (! $langkahTerakhir) {
            return false;
        }

        return (BentukAkhir::periksa(
            $soal->tipe,
            $langkahTerakhir->input_ekspresi,
            $soal->jawaban_akhir,
            $soal->ekspresi_awal,
            $soal->nilai_variabel,
            $soal->variabel_array
        )['cocok'] ?? false);
    }

    /**
     * Memvalidasi satu baris penyelesaian (↵ Cek Step)
     *
     * @return array{benar: bool, pesan: string, langkah_id?: int}
     */
    public function cekStep(SesiKuis $sesi, SoalKuis $soal, string $inputEkspresi): array
    {
        if ($this->langkahSudahSelesai($sesi, $soal)) {
            return [
                'benar' => false,
                'selesai' => true,
                'pesan' => 'Jawaban akhir sudah tercapai. Kumpulkan jawabanmu untuk melanjutkan.',
            ];
        }

        $inputEkspresi = trim($inputEkspresi);

        if ($inputEkspresi === '') {
            return [
                'benar' => false,
                'pesan' => 'Ekspresi matematika tidak boleh kosong.',
            ];
        }

        // Cari langkah benar terakhir pada soal ini
        $langkahTerakhir = LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->where('status_benar', true)
            ->latest('nomor_baris')
            ->first();

        $langkahSebelumnya = $langkahTerakhir?->input_ekspresi ?? $soal->ekspresi_awal;

        $nomorBaris = (int) (LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->max('nomor_baris') ?? 0) + 1;

        try {
            $isBenar = false;
            $pesan = '';

            if ($soal->tipe === 'unsur') {
                $hasil = BentukAkhir::periksa(
                    'unsur',
                    $inputEkspresi,
                    $soal->jawaban_akhir,
                    $soal->ekspresi_awal,
                    null,
                    $soal->variabel_array
                );
                $isBenar = $hasil['cocok'];
                $pesan = $hasil['pesan'];
            } elseif ($soal->tipe === 'substitusi') {
                $hasil = NilaiSubstitusi::cekBarisSubstitusi(
                    $inputEkspresi,
                    $soal->ekspresi_awal ?? '',
                    $soal->nilai_variabel
                );
                $isBenar = $hasil['benar'];
                $pesan = $hasil['pesan'];
            } elseif ($soal->tipe === 'model') {
                // Untuk model, baris pertama dicek ekuivalensinya terhadap jawaban akhir
                $target = $langkahSebelumnya ?: $soal->jawaban_akhir;
                $isBenar = CekEkuivalen::apakahEkuivalen($inputEkspresi, $target, $soal->variabel_array);
                $pesan = $isBenar
                    ? 'Bentuk aljabar benar!'
                    : 'Bentuk belum tepat dengan cerita soal. Coba periksa kembali.';
            } else {
                // sederhanakan, jabarkan, faktorkan
                $target = $langkahSebelumnya ?: ($soal->ekspresi_awal ?: $soal->jawaban_akhir);
                $isBenar = CekEkuivalen::apakahEkuivalen($inputEkspresi, $target, $soal->variabel_array);

                if ($isBenar) {
                    $pesan = 'Langkah benar! Ekuivalen dengan baris sebelumnya.';
                } else {
                    $polaHint = UmpanBalikKesalahan::deteksiPolaSalah($inputEkspresi, $langkahSebelumnya);
                    $pesan = $polaHint ?? 'Belum tepat. Hasil langkah ini belum sama nilainya dengan langkah sebelumnya.';
                }
            }

            // Simpan riwayat langkah ke database
            $langkah = LangkahKuis::create([
                'sesi_kuis_id' => $sesi->id,
                'soal_kuis_id' => $soal->id,
                'nomor_baris' => $nomorBaris,
                'input_ekspresi' => $inputEkspresi,
                'status_benar' => $isBenar,
                'dikumpulkan' => false,
                'dibuat_pada' => now(),
            ]);

            $jumlahLangkahBenar = $isBenar
                ? LangkahKuis::where('sesi_kuis_id', $sesi->id)
                    ->where('soal_kuis_id', $soal->id)
                    ->where('status_benar', true)
                    ->where('dikumpulkan', false)
                    ->count()
                : 0;

            return [
                'benar' => $isBenar,
                'pesan' => $pesan,
                'langkah_id' => $langkah->id,
                'langkah_selesai' => $isBenar && $this->langkahSudahSelesai($sesi, $soal),
            ];
        } catch (Throwable $e) {
            $pesanRamah = GalatRamah::terjemahkan($e);

            LangkahKuis::create([
                'sesi_kuis_id' => $sesi->id,
                'soal_kuis_id' => $soal->id,
                'nomor_baris' => $nomorBaris,
                'input_ekspresi' => $inputEkspresi,
                'status_benar' => false,
                'dikumpulkan' => false,
                'dibuat_pada' => now(),
            ]);

            return [
                'benar' => false,
                'pesan' => $pesanRamah,
            ];
        }
    }

    /**
     * Mengumpulkan jawaban untuk satu soal (boleh benar atau salah)
     *
     * @return array{sukses: bool, cocok: bool, kuis_selesai: bool, pembahasan: ?string, next_nomor: ?int}
     */
    public function kumpulkanSoal(SesiKuis $sesi, SoalKuis $soal, string $inputAkhir): array
    {
        $inputAkhir = trim($inputAkhir);

        // Soal langkah hanya dinilai dari baris terakhir yang sudah lolos Cek Step.
        $barisTerkunciTerakhir = $soal->mode === 'langkah'
            ? LangkahKuis::where('sesi_kuis_id', $sesi->id)
                ->where('soal_kuis_id', $soal->id)
                ->where('status_benar', true)
                ->where('dikumpulkan', false)
                ->latest('nomor_baris')
                ->first()
            : null;

        $jawabanDinilai = $soal->mode === 'langkah'
            ? $barisTerkunciTerakhir?->input_ekspresi
            : $inputAkhir;

        $hasilPemeriksaan = $jawabanDinilai === null
            ? ['cocok' => false]
            : BentukAkhir::periksa(
                $soal->tipe,
                $jawabanDinilai,
                $soal->jawaban_akhir,
                $soal->ekspresi_awal,
                $soal->nilai_variabel,
                $soal->variabel_array
            );

        $cocok = $hasilPemeriksaan['cocok'];

        $nomorBaris = (int) (LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->max('nomor_baris') ?? 0) + 1;

        // Simpan baris pengumpulan
        LangkahKuis::create([
            'sesi_kuis_id' => $sesi->id,
            'soal_kuis_id' => $soal->id,
            'nomor_baris' => $nomorBaris,
            'input_ekspresi' => $jawabanDinilai ?? $inputAkhir,
            'status_benar' => $cocok,
            'dikumpulkan' => true,
            'cocok_jawaban_akhir' => $cocok,
            'dibuat_pada' => now(),
        ]);

        // Tambah jumlah soal yang sudah dikumpulkan bila soal ini belum pernah dikumpulkan di sesi ini
        $sudahDikumpulkanSebelumnya = LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->where('dikumpulkan', true)
            ->count() > 1;

        if (! $sudahDikumpulkanSebelumnya) {
            $sesi->jumlah_soal_dikumpulkan = min(5, $sesi->jumlah_soal_dikumpulkan + 1);
        }

        $kuisSelesai = false;

        // Bila soal nomor 5 sudah dikumpulkan -> Kuis selesai!
        if ($soal->nomor === 5 || $sesi->jumlah_soal_dikumpulkan >= 5) {
            $sesi->status = 'selesai';
            $sesi->waktu_selesai = now();
            $durasi = $sesi->waktu_mulai ? $sesi->waktu_mulai->diffInSeconds(now()) : 0;
            $sesi->durasi_detik = (int) $durasi;

            // Tandai sub-bab tuntas!
            $subBab = $soal->kuis->subBab;
            if ($subBab) {
                $this->progresService->tandaiTuntas($sesi->pengguna, $subBab);
            }

            $kuisSelesai = true;
        }

        $sesi->save();

        return [
            'sukses' => true,
            'cocok' => $cocok,
            'kuis_selesai' => $kuisSelesai,
            'pembahasan' => $soal->pembahasan,
            'next_nomor' => ($soal->nomor < 5 ? $soal->nomor + 1 : null),
        ];
    }
}
