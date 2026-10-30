<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgresSiswa extends Model
{
    use HasFactory;

    protected $table = 'progres_siswa';

    protected $fillable = [
        'pengguna_id',
        'sub_bab_id',
        'status_tuntas',
        'tanggal_tuntas',
    ];

    protected function casts(): array
    {
        return [
            'status_tuntas' => 'boolean',
            'tanggal_tuntas' => 'datetime',
        ];
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function subBab(): BelongsTo
    {
        return $this->belongsTo(SubBab::class, 'sub_bab_id');
    }
}
