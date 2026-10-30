<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\LangkahKuis;
use App\Models\SesiKuis;
use App\Models\SoalKuis;
use App\Services\Hint\HintService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HintController extends Controller
{
    public function __construct(protected HintService $hintService)
    {
    }

    /**
     * Mengambil petunjuk Socratic AI untuk soal kuis latihan
     */
    public function mintaHint(Request $request, SesiKuis $sesi, int $nomor): JsonResponse
    {
        $siswa = Auth::user();

        // Validasi kepemilikan sesi
        if ($sesi->pengguna_id !== $siswa->id) {
            return response()->json(['error' => 'Akses ditolak.'], 403);
        }

        $soal = SoalKuis::where('kuis_id', $sesi->kuis_id)
            ->where('nomor', $nomor)
            ->firstOrFail();

        // Cari baris langkah terakhir yang dibuat siswa jika ada
        $langkahTerakhir = LangkahKuis::where('sesi_kuis_id', $sesi->id)
            ->where('soal_kuis_id', $soal->id)
            ->latest('nomor_baris')
            ->first()?->input_ekspresi;

        $hint = $this->hintService->mintaHint($sesi, $soal, $langkahTerakhir);

        return response()->json([
            'hint' => $hint,
            'jumlah_hint' => $sesi->jumlah_hint_ai,
        ]);
    }
}
