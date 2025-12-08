<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CreateWargaSeeder extends Seeder
{
    public function run()
    {
        // Faker Indonesia
        $faker = Factory::create('id_ID');

        foreach (range(1, 100) as $index) {

            // Buat no KTP format Indonesia
            // 3201 = contoh kode kabupaten, 6 digit tanggal lahir, 4 random
            $kode_daerah = "3201";
            $tanggal = $faker->date('dmy'); // format ddmmyy
            $random_4 = $faker->numerify('####');
            $no_ktp = $kode_daerah . $tanggal . $random_4;

            DB::table('warga')->insert([
                'no_ktp'        => $no_ktp,
                'nama'          => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'pekerjaan'     => $faker->jobTitle,
                'telp'          => $faker->phoneNumber, // otomatis format Indonesia
                'email'         => $faker->unique()->safeEmail,
            ]);
        }
    }
}
