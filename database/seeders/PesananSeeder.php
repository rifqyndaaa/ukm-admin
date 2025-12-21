<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama, aman untuk foreign key
        Pesanan::query()->delete();

        // Reset auto-increment supaya nomor ID mulai dari 1 lagi
        DB::statement('ALTER TABLE pesanan AUTO_INCREMENT = 1');

        $statusOptions = ['pending', 'lunas', 'dikirim', 'batal'];
        $metodeBayarOptions = ['transfer', 'cash', 'ovo', 'gopay'];
        $alamatSample = [
            'Jl. Merdeka No. 10',
            'Jl. Sudirman No. 5',
            'Jl. Thamrin No. 20',
            'Jl. Gatot Subroto No. 15',
            'Jl. Asia Afrika No. 8'
        ];

        $totalWarga = 20; // jumlah warga yang ada
        $pesananData = [];

        for ($i = 1; $i <= 100; $i++) {
            $pesananData[] = [
                'nomor_pesanan' => 'PSN-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'warga_id' => rand(1, $totalWarga),
                'total' => rand(50000, 500000), // total acak antara 50k - 500k
                'status' => $statusOptions[array_rand($statusOptions)],
                'alamat_kirim' => $alamatSample[array_rand($alamatSample)],
                'rt' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 10), 2, '0', STR_PAD_LEFT),
                'metode_bayar' => $metodeBayarOptions[array_rand($metodeBayarOptions)],
            ];
        }

        foreach ($pesananData as $pesanan) {
            Pesanan::create($pesanan);
        }
    }
}
