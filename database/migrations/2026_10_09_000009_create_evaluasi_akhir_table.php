<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluasi_akhir', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->unsignedInteger('percobaan_ke')->default(1);
            $table->unsignedInteger('nilai')->default(0);
            $table->boolean('lulus_kkm')->default(false);
            $table->string('status')->default('berlangsung'); // berlangsung | dikumpulkan
            $table->timestamp('waktu_mulai')->useCurrent();
            $table->timestamp('waktu_selesai')->nullable();
            $table->timestamps();

            $table->unique(['pengguna_id', 'percobaan_ke']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluasi_akhir');
    }
};
