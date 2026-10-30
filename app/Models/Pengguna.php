<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'pengguna';

    protected $fillable = [
        'nama',
        'email',
        'kata_sandi',
        'peran',
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    public function getAuthPasswordName(): string
    {
        return 'kata_sandi';
    }

    public function getAuthPassword(): string
    {
        return $this->kata_sandi;
    }

    public function progresSiswa(): HasMany
    {
        return $this->hasMany(ProgresSiswa::class, 'pengguna_id');
    }

    public function sesiKuis(): HasMany
    {
        return $this->hasMany(SesiKuis::class, 'pengguna_id');
    }

    public function evaluasiAkhir(): HasMany
    {
        return $this->hasMany(EvaluasiAkhir::class, 'pengguna_id');
    }

    public function isGuru(): bool
    {
        return $this->peran === 'guru';
    }

    public function isSiswa(): bool
    {
        return $this->peran === 'siswa';
    }
}
