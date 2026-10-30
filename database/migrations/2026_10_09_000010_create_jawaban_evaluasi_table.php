<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jawaban_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluasi_akhir_id')->constrained('evaluasi_akhir')->cascadeOnDelete();
            $table->foreignId('soal_evaluasi_id')->constrained('soal_evaluasi')->cascadeOnDelete();
            $table->string('jawaban')->nullable();
            $table->boolean('status_benar')->default(false);
            $table->timestamps();

            $table->unique(['evaluasi_akhir_id', 'soal_evaluasi_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jawaban_evaluasi');
    }
};
