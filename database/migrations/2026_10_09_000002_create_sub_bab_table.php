<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sub_bab', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedInteger('urutan')->unique();
            $table->longText('teks_materi');
            $table->decimal('bobot_progres', 5, 4)->default(0.3333);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sub_bab');
    }
};
