<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Services\Dasbor\AgregasiGuruService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DetailSiswaController extends Controller
{
    public function __construct(protected AgregasiGuruService $agregasiService)
    {
    }

    public function show(Pengguna $siswa): View
    {
        if ($siswa->peran !== 'siswa') {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        $guru = Auth::user();
        $detail = $this->agregasiService->detailSiswa($siswa);

        return view('guru.detail-siswa', array_merge(['guru' => $guru], $detail));
    }
}
