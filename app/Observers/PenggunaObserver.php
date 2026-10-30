<?php

namespace App\Observers;

use App\Models\Pengguna;
use App\Models\ProgresSiswa;
use App\Models\SubBab;

class PenggunaObserver
{
    /**
     * Handle the Pengguna "created" event.
     */
    public function created(Pengguna $pengguna): void
    {
        if ($pengguna->isSiswa()) {
            $subBabs = SubBab::orderBy('urutan')->get();

            foreach ($subBabs as $subBab) {
                ProgresSiswa::firstOrCreate(
                    [
                        'pengguna_id' => $pengguna->id,
                        'sub_bab_id' => $subBab->id,
                    ],
                    [
                        'status_tuntas' => false,
                        'tanggal_tuntas' => null,
                    ]
                );
            }
        }
    }
}
