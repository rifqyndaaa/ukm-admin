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
            CreateProdukDummySeeder::class,
            UserSeeder::class,
            PesananSeeder::class,
             DetailPesananSeeder::class,
            UlasanProdukSeeder::class,
        ]);
    }
}
