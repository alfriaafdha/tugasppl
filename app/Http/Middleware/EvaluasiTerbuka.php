<?php

namespace App\Http\Middleware;

use App\Services\Progres\ProgresService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EvaluasiTerbuka
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

        if (! $this->progresService->evaluasiTerbuka($user)) {
            return redirect('/dashboard')->with(
                'error',
                'Evaluasi Akhir masih terkunci. Tuntaskan semua 3 sub-bab materi dan kuisnya terlebih dahulu (progres 100%).'
            );
        }

        return $next($request);
    }
}
