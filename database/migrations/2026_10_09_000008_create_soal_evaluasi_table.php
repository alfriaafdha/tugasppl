<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soal_evaluasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_bab_id')->constrained('sub_bab')->cascadeOnDelete();
            $table->string('tipe'); // unsur | substitusi | sederhanakan | jabarkan | faktorkan | model
            $table->text('teks_soal');
            $table->string('variabel');
            $table->string('ekspresi_awal')->nullable();
            $table->string('nilai_variabel')->nullable();
            $table->string('jawaban_akhir');
            $table->string('subtopik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soal_evaluasi');
    }
};
