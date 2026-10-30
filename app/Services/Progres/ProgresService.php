<?php

namespace App\Services\Progres;

use App\Models\Pengguna;
use App\Models\ProgresSiswa;
use App\Models\SubBab;

class ProgresService
{
    /**
     * Menghitung persentase progres belajar siswa (0%, 33%, 67%, 100%)
     */
    public function persenProgres(Pengguna $pengguna): int
    {
        $totalSubBab = SubBab::count();
        if ($totalSubBab === 0) {
            return 0;
        }

        $tuntasCount = ProgresSiswa::where('pengguna_id', $pengguna->id)
            ->where('status_tuntas', true)
            ->count();

        if ($tuntasCount >= $totalSubBab) {
            return 100;
        }

        if ($tuntasCount === 0) {
            return 0;
        }

        return (int) round(($tuntasCount / $totalSubBab) * 100);
    }

    /**
     * Memeriksa apakah suatu sub-bab sudah terbuka untuk diakses oleh siswa
     */
    public function subBabTerbuka(Pengguna $pengguna, SubBab $subBab): bool
    {
        // Sub-bab pertama (urutan 1) selalu terbuka
        if ($subBab->urutan === 1) {
            return true;
        }

        // Sub-bab urutan N hanya terbuka jika sub-bab urutan N - 1 sudah tuntas
        $prevSubBab = SubBab::where('urutan', $subBab->urutan - 1)->first();
        if (! $prevSubBab) {
            return true;
        }

        $prevProgres = ProgresSiswa::where('pengguna_id', $pengguna->id)
            ->where('sub_bab_id', $prevSubBab->id)
            ->first();

        return (bool) ($prevProgres && $prevProgres->status_tuntas);
    }

    /**
     * Menandai sub-bab tuntas untuk siswa (idempoten)
     */
    public function tandaiTuntas(Pengguna $pengguna, SubBab $subBab): void
    {
        ProgresSiswa::updateOrCreate(
            [
                'pengguna_id' => $pengguna->id,
                'sub_bab_id' => $subBab->id,
            ],
            [
                'status_tuntas' => true,
                'tanggal_tuntas' => now(),
            ]
        );
    }

    /**
     * Memeriksa apakah Evaluasi Akhir sudah terbuka (hanya pada progres 100%)
     */
    public function evaluasiTerbuka(Pengguna $pengguna): bool
    {
        return $this->persenProgres($pengguna) >= 100;
    }
}
