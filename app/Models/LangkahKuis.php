<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LangkahKuis extends Model
{
    use HasFactory;

    protected $table = 'langkah_kuis';

    protected $fillable = [
        'sesi_kuis_id',
        'soal_kuis_id',
        'nomor_baris',
        'input_ekspresi',
        'status_benar',
        'dikumpulkan',
        'cocok_jawaban_akhir',
        'dibuat_pada',
    ];

    protected function casts(): array
    {
        return [
            'nomor_baris' => 'integer',
            'status_benar' => 'boolean',
            'dikumpulkan' => 'boolean',
            'cocok_jawaban_akhir' => 'boolean',
            'dibuat_pada' => 'datetime',
        ];
    }

    public function sesiKuis(): BelongsTo
    {
        return $this->belongsTo(SesiKuis::class, 'sesi_kuis_id');
    }

    public function soalKuis(): BelongsTo
    {
        return $this->belongsTo(SoalKuis::class, 'soal_kuis_id');
    }

    public function getEkspresiSiswaAttribute(): string
    {
        return $this->input_ekspresi ?? '';
    }

    public function getApakahEkuivalenAttribute(): bool
    {
        return (bool) $this->status_benar;
    }
}
