<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Umkm;
use Faker\Factory as Faker;

class CreateUmkmDummySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {

            Umkm::create([
                'nama_usaha' => 'UMKM ' . $faker->company,
                'pemilik_warga_id' => rand(1, 20), // sesuaikan dengan data warga kamu
                'alamat' => $faker->address,
                'rt' => str_pad(rand(1, 20), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 20), 2, '0', STR_PAD_LEFT),
                'kategori' => $faker->randomElement([
                    'Makanan', 'Minuman', 'Fashion', 'Jasa', 'Kerajinan', 'Sembako'
                ]),
                'kontak' => $faker->phoneNumber,
                'deskripsi' => $faker->text(50),
            ]);
        }
    }
}
