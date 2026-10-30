<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SoalKuis extends Model
{
    use HasFactory;

    protected $table = 'soal_kuis';

    protected $fillable = [
        'kuis_id',
        'nomor',
        'tipe',
        'mode',
        'jumlah_langkah',
        'teks_soal',
        'variabel',
        'ekspresi_awal',
        'nilai_variabel',
        'jawaban_akhir',
        'subtopik',
        'hint_cadangan',
        'pembahasan',
    ];

    protected function casts(): array
    {
        return [
            'nomor' => 'integer',
            'jumlah_langkah' => 'integer',
        ];
    }

    public function kuis(): BelongsTo
    {
        return $this->belongsTo(Kuis::class, 'kuis_id');
    }

    public function langkahKuis(): HasMany
    {
        return $this->hasMany(LangkahKuis::class, 'soal_kuis_id');
    }

    /**
     * Array of allowed variables for this question (for keyboard grid)
     */
    public function getVariabelArrayAttribute(): array
    {
        if (empty($this->variabel)) {
            return ['x'];
        }

        return array_map('trim', explode(',', $this->variabel));
    }
}
