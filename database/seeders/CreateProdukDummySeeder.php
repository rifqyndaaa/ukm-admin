<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;
use Faker\Factory as Faker;

class CreateProdukDummySeeder extends Seeder
{
    public function run(): void
    {
        // Faker Indonesia
        $faker = Faker::create('id_ID');

        // Nama produk Indonesia random
        $namaProduk = [
            'Keripik Singkong', 'Sambal Rumahan', 'Kopi Robusta',
            'Kerajinan Kayu', 'Batik Tulis', 'Tas Rajut',
            'Kue Kering', 'Brownies Panggang', 'Madu Hutan',
            'Minyak Herbal', 'Sayur Organik', 'Kerupuk Ikan',
            'Abon Sapi', 'Jamu Tradisional', 'Nasi Box',
        ];

        for ($i = 1; $i <= 100; $i++) {

            Produk::create([
                'umkm_id'     => $faker->numberBetween(1, 10), // sesuaikan dgn jumlah UMKM
                'nama_produk' => $faker->randomElement($namaProduk) . " " . $faker->randomNumber(2),
                'deskripsi'   => $faker->text(100), // deskripsi bahasa Indonesia
                'harga'       => $faker->numberBetween(5000, 500000),
                'stok'        => $faker->numberBetween(1, 200),
                'status'      => $faker->randomElement(['aktif', 'nonaktif']),
            ]);
        }
    }
}
