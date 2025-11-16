<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class CreateWargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 100) as $index) {
            DB::table('warga')->insert([
                'no_ktp' => $faker->unique()->numerify('3201############'),
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'pekerjaan' => $faker->jobTitle,
                'telp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
