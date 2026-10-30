<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoalEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'soal_evaluasi';

    protected $fillable = [
        'sub_bab_id',
        'tipe',
        'teks_soal',
        'variabel',
        'ekspresi_awal',
        'nilai_variabel',
        'jawaban_akhir',
        'subtopik',
    ];

    public function subBab(): BelongsTo
    {
        return $this->belongsTo(SubBab::class, 'sub_bab_id');
    }

    public function jawabanEvaluasi(): HasMany
    {
        return $this->hasMany(JawabanEvaluasi::class, 'soal_evaluasi_id');
    }

    public function getVariabelArrayAttribute(): array
    {
        if (empty($this->variabel)) {
            return ['x'];
        }

        return array_map('trim', explode(',', $this->variabel));
    }
}
