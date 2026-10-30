<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('soal_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuis_id')->constrained('kuis')->cascadeOnDelete();
            $table->unsignedTinyInteger('nomor'); // 1-5
            $table->string('tipe'); // unsur | substitusi | sederhanakan | jabarkan | faktorkan | model
            $table->text('teks_soal');
            $table->string('variabel'); // e.g. "n", "x", "a,b", "x,y"
            $table->string('ekspresi_awal')->nullable();
            $table->string('nilai_variabel')->nullable();
            $table->string('jawaban_akhir');
            $table->string('subtopik');
            $table->text('hint_cadangan')->nullable();
            $table->text('pembahasan')->nullable();
            $table->timestamps();

            $table->unique(['kuis_id', 'nomor']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('soal_kuis');
    }
};
