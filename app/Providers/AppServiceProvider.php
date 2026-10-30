<?php

namespace App\Providers;

use App\Models\Pengguna;
use App\Observers\PenggunaObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Pengguna::observe(PenggunaObserver::class);

        // Pagar Pengaman: Jangan biarkan mode masuk sementara aktif di production
        if (app()->environment('production') && config('aljabarlearn.masuk_sementara')) {
            throw new \RuntimeException('Mode MASUK_SEMENTARA tidak boleh aktif di lingkungan produksi!');
        }
    }
}
