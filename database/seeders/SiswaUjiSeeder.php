<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaUjiSeeder extends Seeder
{
    public function run(): void
    {
        $siswaContoh = [
            [
                'nama' => 'Arief Rahman',
                'email' => 'siswa-1@lokal.test',
                'kata_sandi' => Hash::make('password123'),
                'peran' => 'siswa',
            ],
            [
                'nama' => 'Dewi Sartika',
                'email' => 'siswa-2@lokal.test',
                'kata_sandi' => Hash::make('password123'),
                'peran' => 'siswa',
            ],
            [
                'nama' => 'Nyoman Pratama',
                'email' => 'siswa-3@lokal.test',
                'kata_sandi' => Hash::make('password123'),
                'peran' => 'siswa',
            ],
        ];

        foreach ($siswaContoh as $data) {
            Pengguna::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
