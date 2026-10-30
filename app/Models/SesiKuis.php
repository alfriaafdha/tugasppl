<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SesiKuis extends Model
{
    use HasFactory;

    protected $table = 'sesi_kuis';

    protected $fillable = [
        'pengguna_id',
        'kuis_id',
        'percobaan_ke',
        'status',
        'waktu_mulai',
        'waktu_selesai',
        'durasi_detik',
        'jumlah_hint_ai',
        'jumlah_soal_dikumpulkan',
    ];

    protected function casts(): array
    {
        return [
            'percobaan_ke' => 'integer',
            'waktu_mulai' => 'datetime',
            'waktu_selesai' => 'datetime',
            'durasi_detik' => 'integer',
            'jumlah_hint_ai' => 'integer',
            'jumlah_soal_dikumpulkan' => 'integer',
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

    public function scopeSelesai(Builder $query): Builder
    {
        return $query->where('status', 'selesai');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }

    public function kuis(): BelongsTo
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    public function langkahKuis(): HasMany
    {
        return $this->hasMany(LangkahKuis::class, 'sesi_kuis_id');
    }
}
