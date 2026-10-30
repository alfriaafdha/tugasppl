<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('soal_kuis', function (Blueprint $table) {
            $table->string('mode')->default('langsung')->after('tipe');
        });

        $kuisA = DB::table('kuis')
            ->join('sub_bab', 'sub_bab.id', '=', 'kuis.sub_bab_id')
            ->where('sub_bab.urutan', 1)
            ->pluck('kuis.id');
        $kuisB = DB::table('kuis')
            ->join('sub_bab', 'sub_bab.id', '=', 'kuis.sub_bab_id')
            ->where('sub_bab.urutan', 2)
            ->pluck('kuis.id');

        DB::table('soal_kuis')->whereIn('kuis_id', $kuisA)->where('nomor', 4)->update(['mode' => 'langkah']);
        DB::table('soal_kuis')->whereIn('kuis_id', $kuisB)->whereIn('nomor', [2, 3, 4])->update(['mode' => 'langkah']);
    }

    public function down(): void
    {
        Schema::table('soal_kuis', function (Blueprint $table) {
            $table->dropColumn('mode');
        });
    }
};
