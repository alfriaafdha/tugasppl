<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kuis extends Model
{
    use HasFactory;

    protected $table = 'kuis';

    protected $fillable = [
        'sub_bab_id',
        'judul',
    ];

    public function subBab(): BelongsTo
    {
        return $this->belongsTo(SubBab::class, 'sub_bab_id');
    }

    public function soalKuis(): HasMany
    {
        return $this->hasMany(SoalKuis::class, 'kuis_id')->orderBy('nomor');
    }

    public function sesiKuis(): HasMany
    {
        return $this->hasMany(SesiKuis::class, 'kuis_id');
    }
}
