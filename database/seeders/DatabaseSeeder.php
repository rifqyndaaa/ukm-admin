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
            CreateWargaSeeder::class,
            CreateUmkmDummySeeder::class,
            // Tambah seeder lainnya di sini
        ]);
    }
}
