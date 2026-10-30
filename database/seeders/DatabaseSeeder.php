<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SubBabSeeder::class,
            KuisSeeder::class,
            SoalEvaluasiSeeder::class,
            GuruSeeder::class,
            SiswaUjiSeeder::class,
        ]);
    }
}
