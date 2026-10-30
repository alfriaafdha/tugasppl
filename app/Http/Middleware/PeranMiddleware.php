<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PeranMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $peran): Response
    {
        $user = Auth::user();

        if (! $user) {
            return redirect('/')->with('error', 'Silakan masuk terlebih dahulu.');
        }

        if ($user->peran !== $peran) {
            if ($peran === 'guru') {
                abort(403, 'Akses ditolak: Hanya akun guru yang dapat mengakses halaman dasbor guru.');
            }

            // Guru mencoba mengakses rute siswa diarahkan ke dasbor guru
            if ($user->peran === 'guru') {
                return redirect('/guru');
            }

            abort(403, 'Akses ditolak untuk peran Anda.');
        }

        return $next($request);
    }
}
