<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Pengaturan Kriteria Ketuntasan Minimal (KKM) Evaluasi Akhir
    |--------------------------------------------------------------------------
    */
    'kkm_evaluasi' => (int) env('KKM_EVALUASI', 65),

    /*
    |--------------------------------------------------------------------------
    | Pengaturan Soal & Durasi Evaluasi Akhir
    |--------------------------------------------------------------------------
    */
    'evaluasi_jumlah_soal' => (int) env('EVALUASI_JUMLAH_SOAL', 20),
    'evaluasi_durasi_detik' => (int) env('EVALUASI_DURASI_DETIK', 3600),

    /*
    |--------------------------------------------------------------------------
    | Mode Gerbang Masuk Sementara
    |--------------------------------------------------------------------------
    | Bila true, gerbang masuk tanpa login diizinkan (hanya untuk dev/test).
    | Otomatis ditolak jika APP_ENV == 'production'.
    */
    'masuk_sementara' => (bool) env('MASUK_SEMENTARA', true),

    /*
    |--------------------------------------------------------------------------
    | Konfigurasi Google Gemini API (Socratic AI Tutor)
    |--------------------------------------------------------------------------
    */
    'gemini' => [
        'api_key' => env('GEMINI_API_KEY', ''),
        'model' => env('GEMINI_MODEL', 'gemini-1.5-flash'),
        'timeout' => (int) env('GEMINI_TIMEOUT', 6),
    ],
];
