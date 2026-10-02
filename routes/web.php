<?php

use Illuminate\Support\Facades\Route;

// Halaman Utama / Landing Page (Langsung masuk tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// Dasbor Siswa (dengan Navbar di sisi kiri)
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Halaman Pembelajaran Materi & Kuis (dengan Navbar di sisi kiri)
Route::get('/materi', function () {
    return view('materi');
});