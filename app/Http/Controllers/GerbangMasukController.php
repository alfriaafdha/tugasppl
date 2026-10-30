<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class GerbangMasukController extends Controller
{
    /**
     * Tampilkan landing page beserta formulir masuk cepat (siswa & guru)
     */
    public function index(): Response
    {
        $siswaList = Pengguna::where('peran', 'siswa')->orderBy('nama')->get();
        $guru = Pengguna::where('peran', 'guru')->first();

        return response()
            ->view('welcome', compact('siswaList', 'guru'))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache');
    }

    /**
     * Masuk sebagai siswa (pilih yang sudah ada atau buat nama baru)
     */
    public function masukSiswa(Request $request): RedirectResponse
    {
        // 1. Jika memilih siswa yang sudah ada
        if ($request->filled('siswa_id')) {
            $siswa = Pengguna::where('id', $request->siswa_id)->where('peran', 'siswa')->first();
            if ($siswa) {
                Auth::login($siswa);
                $request->session()->regenerate();
                return redirect('/dashboard')->with('success', "Selamat datang kembali, {$siswa->nama}!");
            }
        }

        // 2. Jika membuat siswa baru dengan nama
        $request->validate([
            'nama_baru' => 'required|string|min:2|max:100',
        ], [
            'nama_baru.required' => 'Silakan masukkan nama siswa untuk mulai belajar.',
            'nama_baru.min' => 'Nama minimal 2 huruf.',
        ]);

        $uniq = Str::lower(Str::random(6));
        $emailPlaceholder = "siswa-{$uniq}@lokal.test";

        $siswaBaru = Pengguna::create([
            'nama' => trim($request->nama_baru),
            'email' => $emailPlaceholder,
            'kata_sandi' => Hash::make(Str::random(16)),
            'peran' => 'siswa',
        ]);

        Auth::login($siswaBaru);
        $request->session()->regenerate();

        return redirect('/dashboard')->with('success', "Selamat belajar di AljabarLearn, {$siswaBaru->nama}!");
    }

    /**
     * Masuk langsung sebagai Guru
     */
    public function masukGuru(Request $request): RedirectResponse
    {
        $guru = Pengguna::where('peran', 'guru')->first();

        if (! $guru) {
            $guru = Pengguna::create([
                'nama' => 'Bpk. Hendra, S.Pd. (Guru Matematika)',
                'email' => 'guru@aljabarlearn.test',
                'kata_sandi' => Hash::make('guru1234'),
                'peran' => 'guru',
            ]);
        }

        Auth::login($guru);
        $request->session()->regenerate();

        return redirect('/guru')->with('success', "Selamat datang di Dasbor Pemantauan Guru, {$guru->nama}!");
    }
}
