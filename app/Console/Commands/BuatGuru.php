<?php

namespace App\Console\Commands;

use App\Models\Pengguna;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class BuatGuru extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guru:buat {nama?} {email?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat akun guru baru untuk AljabarLearn';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $nama = $this->argument('nama') ?: $this->ask('Masukkan nama guru');
        $email = $this->argument('email') ?: $this->ask('Masukkan email guru');
        $password = $this->argument('password') ?: $this->secret('Masukkan password guru');

        $guru = Pengguna::updateOrCreate(
            ['email' => strtolower(trim($email))],
            [
                'nama' => trim($nama),
                'kata_sandi' => Hash::make($password),
                'peran' => 'guru',
            ]
        );

        $this->info("Akun guru berhasil dibuat/diperbarui: {$guru->nama} ({$guru->email})");

        return Command::SUCCESS;
    }
}
