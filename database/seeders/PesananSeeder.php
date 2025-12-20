<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        Pesanan::create([
            'nomor_pesanan' => 'PSN-001',
            'warga_id'      => 1,
            'total'         => 150000,
            'status'        => 'pending',
            'alamat_kirim'  => 'Jl. Mawar No. 10',
            'rt'            => '01',
            'rw'            => '02',
            'metode_bayar'  => 'COD'
        ]);

        Pesanan::create([
            'nomor_pesanan' => 'PSN-002',
            'warga_id'      => 2,
            'total'         => 275000,
            'status'        => 'diproses',
            'alamat_kirim'  => 'Jl. Melati No. 5',
            'rt'            => '03',
            'rw'            => '04',
            'metode_bayar'  => 'Transfer'
        ]);
    }
}
