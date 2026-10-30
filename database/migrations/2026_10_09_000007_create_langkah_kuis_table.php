<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('langkah_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sesi_kuis_id')->constrained('sesi_kuis')->cascadeOnDelete();
            $table->foreignId('soal_kuis_id')->constrained('soal_kuis')->cascadeOnDelete();
            $table->unsignedInteger('nomor_baris')->default(1);
            $table->string('input_ekspresi');
            $table->boolean('status_benar')->default(false);
            $table->boolean('dikumpulkan')->default(false);
            $table->boolean('cocok_jawaban_akhir')->nullable();
            $table->timestamp('dibuat_pada')->nullable();
            $table->timestamps();

            $table->index(['sesi_kuis_id', 'soal_kuis_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('langkah_kuis');
    }
};
