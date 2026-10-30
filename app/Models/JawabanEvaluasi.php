<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JawabanEvaluasi extends Model
{
    use HasFactory;

    protected $table = 'jawaban_evaluasi';

    protected $fillable = [
        'evaluasi_akhir_id',
        'soal_evaluasi_id',
        'jawaban',
        'status_benar',
    ];

    protected function casts(): array
    {
        return [
            'status_benar' => 'boolean',
        ];
    }

    public function evaluasiAkhir(): BelongsTo
    {
        return $this->belongsTo(EvaluasiAkhir::class, 'evaluasi_akhir_id');
    }

    public function soalEvaluasi(): BelongsTo
    {
        return $this->belongsTo(SoalEvaluasi::class, 'soal_evaluasi_id');
    }
}
