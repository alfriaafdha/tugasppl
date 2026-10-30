<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubBab extends Model
{
    use HasFactory;

    protected $table = 'sub_bab';

    protected $fillable = [
        'judul',
        'urutan',
        'teks_materi',
        'bobot_progres',
    ];

    protected function casts(): array
    {
        return [
            'urutan' => 'integer',
            'bobot_progres' => 'float',
        ];
    }

    public function kuis(): HasOne
    {
        return $this->hasOne(Kuis::class, 'sub_bab_id');
    }

    public function progresSiswa(): HasMany
    {
        return $this->hasMany(ProgresSiswa::class, 'sub_bab_id');
    }

    public function soalEvaluasi(): HasMany
    {
        return $this->hasMany(SoalEvaluasi::class, 'sub_bab_id');
    }

    public function getIsiMarkdownAttribute(): string
    {
        return $this->teks_materi ?? '';
    }
}
