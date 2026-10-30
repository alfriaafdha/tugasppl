<?php

namespace App\Http\Middleware;

use App\Models\SubBab;
use App\Services\Progres\ProgresService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SubBabTerbuka
{
    public function __construct(protected ProgresService $progresService)
    {
    }

    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (! $user) {
            return redirect('/')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        $subBabParam = $request->route('subBab');

        if (! $subBabParam instanceof SubBab) {
            $subBab = SubBab::find($subBabParam);
        } else {
            $subBab = $subBabParam;
        }

        if (! $subBab) {
            abort(404, 'Sub-bab tidak ditemukan.');
        }

        if (! $this->progresService->subBabTerbuka($user, $subBab)) {
            return redirect('/dashboard')->with(
                'error',
                "Sub-bab '{$subBab->judul}' masih terkunci. Selesaikan kuis sub-bab sebelumnya terlebih dahulu."
            );
        }

        return $next($request);
    }
}
