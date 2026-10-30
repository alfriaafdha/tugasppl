<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\SesiKuis;
use App\Models\SubBab;
use App\Services\Kuis\KuisService;
use App\Services\Progres\ProgresService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SubBabController extends Controller
{
    public function __construct(
        protected ProgresService $progresService,
        protected KuisService $kuisService
    ) {
    }

    public function show(SubBab $subBab): View
    {
        $siswa = Auth::user();
        $persen = $this->progresService->persenProgres($siswa);
        $kuis = $subBab->kuis;

        // Ambil sesi kuis siswa untuk kuis ini jika ada
        $sesiAktif = null;
        $sesiTerakhir = null;

        if ($kuis) {
            $sesiAktif = SesiKuis::where('pengguna_id', $siswa->id)
                ->where('kuis_id', $kuis->id)
                ->where('status', 'berlangsung')
                ->latest('id')
                ->first();

            $sesiTerakhir = SesiKuis::where('pengguna_id', $siswa->id)
                ->where('kuis_id', $kuis->id)
                ->latest('id')
                ->first();
        }

        // Cek status tuntas
        $progres = $siswa->progresSiswa()->where('sub_bab_id', $subBab->id)->first();
        $isTuntas = (bool) ($progres && $progres->status_tuntas);

        // Sub-bab berikutnya
        $nextSubBab = SubBab::where('urutan', $subBab->urutan + 1)->first();
        $nextTerbuka = (bool) $nextSubBab;
        $evaluasiTerbuka = $this->progresService->evaluasiTerbuka($siswa);

        $kamusIstilah = require database_path('seeders/data/kamus-istilah.php');

        return view('siswa.sub-bab', compact(
            'siswa',
            'persen',
            'subBab',
            'kuis',
            'sesiAktif',
            'sesiTerakhir',
            'isTuntas',
            'nextSubBab',
            'nextTerbuka',
            'evaluasiTerbuka',
            'kamusIstilah'
        ));
    }
}
