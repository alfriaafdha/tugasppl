<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Pengguna::updateOrCreate(
            ['email' => 'guru@aljabarlearn.test'],
            [
                'nama' => 'Bpk. Hendra, S.Pd. (Guru Matematika)',
                'kata_sandi' => Hash::make('guru1234'),
                'peran' => 'guru',
            ]
        );
    }
}
