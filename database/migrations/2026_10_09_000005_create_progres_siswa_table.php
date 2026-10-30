<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progres_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('sub_bab_id')->constrained('sub_bab')->cascadeOnDelete();
            $table->boolean('status_tuntas')->default(false);
            $table->timestamp('tanggal_tuntas')->nullable();
            $table->timestamps();

            $table->unique(['pengguna_id', 'sub_bab_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progres_siswa');
    }
};
