<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Services\Dasbor\AgregasiGuruService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DasborGuruController extends Controller
{
    public function __construct(protected AgregasiGuruService $agregasiService)
    {
    }

    public function index(): View
    {
        $guru = Auth::user();
        $daftarSiswa = $this->agregasiService->daftarSiswa();
        $statistik = $this->agregasiService->statistikKelas();

        return view('guru.dasbor', compact('guru', 'daftarSiswa', 'statistik'));
    }
}
