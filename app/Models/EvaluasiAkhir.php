<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EvaluasiAkhir extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_akhir';

    protected $fillable = [
        'pengguna_id',
        'percobaan_ke',
        'nilai',
        'lulus_kkm',
        'status',
        'waktu_mulai',
        'waktu_selesai',
    ];

    protected function casts(): array
    {
        return [
            'percobaan_ke' => 'integer',
            'nilai' => 'integer',
            'lulus_kkm' => 'boolean',
            'waktu_mulai' => 'datetime',
            'waktu_selesai' => 'datetime',
        ];
    }

    public function scopeMilikPengguna(Builder $query, int $penggunaId): Builder
    {
        return $query->where('pengguna_id', $penggunaId);
    }

    public function scopeBerlangsung(Builder $query): Builder
    {
        return $query->where('status', 'berlangsung');
    }

    public function scopeDikumpulkan(Builder $query): Builder
    {
        return $query->where('status', 'dikumpulkan');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function jawabanEvaluasi(): HasMany
    {
        return $this->hasMany(JawabanEvaluasi::class, 'evaluasi_akhir_id');
    }

    public function getSkorTotalAttribute(): int
    {
        return (int) ($this->nilai ?? 0);
    }
}
