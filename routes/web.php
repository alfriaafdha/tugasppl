<?php

use App\Http\Controllers\GerbangMasukController;
use App\Http\Controllers\Guru\DasborGuruController;
use App\Http\Controllers\Guru\DetailSiswaController;
use App\Http\Controllers\Guru\RingkasanMateriController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\Siswa\DasborSiswaController;
use App\Http\Controllers\Siswa\EvaluasiController;
use App\Http\Controllers\Siswa\HintController;
use App\Http\Controllers\Siswa\KuisController;
use App\Http\Controllers\Siswa\SubBabController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - AljabarLearn
|--------------------------------------------------------------------------
*/

// Landing Page dengan Gerbang Masuk Langsung (Tanpa Login Terpisah)
Route::get('/', [GerbangMasukController::class, 'index'])->name('landing');
Route::post('/masuk/siswa', [GerbangMasukController::class, 'masukSiswa'])->name('masuk.siswa');
Route::post('/masuk/guru', [GerbangMasukController::class, 'masukGuru'])->name('masuk.guru');
Route::post('/keluar', [KeluarController::class, 'keluar'])->name('keluar');

// Area Pembelajaran Siswa (Peran: Siswa)
Route::middleware(['auth', 'peran:siswa'])->group(function () {
    // Dasbor Siswa
    Route::get('/dashboard', [DasborSiswaController::class, 'index'])->name('dashboard');
    Route::get('/siswa/dasbor', [DasborSiswaController::class, 'index'])->name('siswa.dasbor');

    // Akses semua materi dibuka sementara untuk pengetesan.
    Route::get('/sub-bab/{subBab}', [SubBabController::class, 'show'])
        ->name('siswa.subbab.show');

    // Kuis Latihan Sub-Bab
    Route::post('/sub-bab/{subBab}/kuis/mulai', [KuisController::class, 'mulai'])
        ->name('siswa.kuis.mulai');

    Route::post('/sub-bab/{subBab}/kuis/ulang', [KuisController::class, 'ulang'])
        ->name('siswa.kuis.ulang');

    Route::get('/sesi/{sesi}/soal/{nomor}', [KuisController::class, 'soal'])
        ->name('siswa.kuis.soal');

    Route::post('/sesi/{sesi}/soal/{nomor}/cek-step', [KuisController::class, 'cekStep'])
        ->name('siswa.kuis.cek-step');

    Route::post('/sesi/{sesi}/soal/{nomor}/kumpul', [KuisController::class, 'kumpul'])
        ->name('siswa.kuis.kumpul');

    // Socratic AI Hint (Hanya untuk kuis latihan, tidak ada di Evaluasi)
    Route::post('/sesi/{sesi}/soal/{nomor}/hint', [HintController::class, 'mintaHint'])
        ->name('siswa.kuis.hint');

    // Evaluasi Akhir (Terkunci sebelum progres 100%, Steril dari AI)
    Route::middleware('evaluasi.terbuka')->group(function () {
        Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('siswa.evaluasi.index');
        Route::post('/evaluasi/mulai', [EvaluasiController::class, 'mulai'])->name('siswa.evaluasi.mulai');
        Route::get('/evaluasi/{evaluasi}', [EvaluasiController::class, 'kerja'])->name('siswa.evaluasi.kerja');
        Route::put('/evaluasi/{evaluasi}/jawaban/{soal}', [EvaluasiController::class, 'simpanJawaban'])->name('siswa.evaluasi.jawaban');
        Route::post('/evaluasi/{evaluasi}/kumpul', [EvaluasiController::class, 'kumpul'])->name('siswa.evaluasi.kumpul');
        Route::get('/evaluasi/{evaluasi}/hasil', [EvaluasiController::class, 'hasil'])->name('siswa.evaluasi.hasil');
    });
});

// Area Dasbor Guru (Peran: Guru, Baca-Saja)
Route::middleware(['auth', 'peran:guru'])->prefix('guru')->group(function () {
    Route::get('/', [DasborGuruController::class, 'index'])->name('guru.dasbor');
    Route::get('/siswa/{siswa}', [DetailSiswaController::class, 'show'])->name('guru.siswa.detail');
    Route::get('/ringkasan-materi', [RingkasanMateriController::class, 'index'])->name('guru.ringkasan');
});
