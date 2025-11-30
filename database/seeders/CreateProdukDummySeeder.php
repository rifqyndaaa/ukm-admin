<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Faker\Factory as Faker;

class CreateProdukDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {
            Produk::create([
                'umkm_id' => $faker->numberBetween(1, 10), // sesuaikan dengan jumlah UMKM kamu
                'nama_produk' => 'Produk ' . $i,
                'deskripsi' => $faker->sentence(10),
                'harga' => $faker->numberBetween(5000, 500000),
                'stok' => $faker->numberBetween(1, 200),
                'status' => $faker->randomElement(['aktif', 'nonaktif']),
            ]);
        }
    }
}
