<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\SubBab;
use App\Services\Progres\ProgresService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DasborSiswaController extends Controller
{
    public function __construct(protected ProgresService $progresService)
    {
    }

    public function index(): View
    {
        $siswa = Auth::user();
        $persen = $this->progresService->persenProgres($siswa);
        $evaluasiTerbuka = $this->progresService->evaluasiTerbuka($siswa);

        $subBabs = SubBab::with(['kuis', 'progresSiswa' => function ($q) use ($siswa) {
            $q->where('pengguna_id', $siswa->id);
        }])->orderBy('urutan')->get();

        $daftarSubBab = $subBabs->map(function ($sb) use ($siswa) {
            $progres = $sb->progresSiswa->first();
            $tuntas = (bool) ($progres && $progres->status_tuntas);
            return [
                'model' => $sb,
                'id' => $sb->id,
                'urutan' => $sb->urutan,
                'judul' => $sb->judul,
                'status_tuntas' => $tuntas,
                'status_terbuka' => true,
                'kuis_id' => $sb->kuis?->id,
            ];
        });

        $riwayatEvaluasi = $siswa->evaluasiAkhir()->orderByDesc('id')->get();
        $kamusIstilah = require database_path('seeders/data/kamus-istilah.php');

        $totalSesi = $siswa->sesiKuis()->count();
        $sesiSelesai = $siswa->sesiKuis()->where('status', 'selesai')->count();
        $evaluasiTerbaik = $siswa->evaluasiAkhir()->max('nilai');
        $lulusEvaluasi = $siswa->evaluasiAkhir()->where('lulus_kkm', true)->exists();

        return view('siswa.dasbor', compact(
            'siswa',
            'persen',
            'daftarSubBab',
            'evaluasiTerbuka',
            'riwayatEvaluasi',
            'kamusIstilah',
            'totalSesi',
            'sesiSelesai',
            'evaluasiTerbaik',
            'lulusEvaluasi'
        ));
    }
}
