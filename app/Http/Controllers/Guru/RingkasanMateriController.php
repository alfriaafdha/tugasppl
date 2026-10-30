<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Services\Dasbor\AgregasiGuruService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RingkasanMateriController extends Controller
{
    public function __construct(protected AgregasiGuruService $agregasiService)
    {
    }

    public function index(): View
    {
        $guru = Auth::user();
        $ringkasan = $this->agregasiService->ringkasanMateriSulit();

        return view('guru.ringkasan-materi', compact('guru', 'ringkasan'));
    }
}
