<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sesi_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('kuis_id')->constrained('kuis')->cascadeOnDelete();
            $table->unsignedInteger('percobaan_ke')->default(1);
            $table->string('status')->default('berlangsung'); // berlangsung | selesai
            $table->timestamp('waktu_mulai')->useCurrent();
            $table->timestamp('waktu_selesai')->nullable();
            $table->unsignedInteger('durasi_detik')->nullable();
            $table->unsignedInteger('jumlah_hint_ai')->default(0);
            $table->unsignedInteger('jumlah_soal_dikumpulkan')->default(0);
            $table->timestamps();

            $table->unique(['pengguna_id', 'kuis_id', 'percobaan_ke']);
            $table->index('kuis_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sesi_kuis');
    }
};
