<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CreateUmkmDummySeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('umkm')->insert([
                'nama_usaha'       => $faker->company,
                'pemilik_warga_id' => $faker->numberBetween(1, 100),  // dummy ID saja
                'alamat'           => $faker->streetAddress,
                'rt'               => $faker->numberBetween(1, 20),
                'rw'               => $faker->numberBetween(1, 10),
                'kategori'         => $faker->randomElement(['Kuliner', 'Fashion', 'Elektronik', 'Jasa', 'Pertanian']),
                'kontak'           => $faker->phoneNumber,
                'deskripsi'        => $faker->sentence(10),
                'foto_usaha'       => 'dummy.jpg',
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
