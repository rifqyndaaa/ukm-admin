<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPesanan;

class DetailPesananSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        DetailPesanan::truncate();

        $totalPesanan = 100; // jumlah pesanan
        $totalProduk = 10;   // jumlah produk yang tersedia

        $detailPesananData = [];

        for ($pesananId = 1; $pesananId <= $totalPesanan; $pesananId++) {
            // Setiap pesanan punya 1 sampai 5 produk
            $jumlahProduk = rand(1, 5);
            $produkDipilih = [];

            for ($i = 0; $i < $jumlahProduk; $i++) {
                // pastikan produk tidak duplikat dalam satu pesanan
                do {
                    $produkId = rand(1, $totalProduk);
                } while (in_array($produkId, $produkDipilih));

                $produkDipilih[] = $produkId;

                $qty = rand(1, 5);
                $hargaSatuan = rand(20000, 100000); // harga acak per produk
                $subtotal = $qty * $hargaSatuan;

                $detailPesananData[] = [
                    'pesanan_id' => $pesananId,
                    'produk_id' => $produkId,
                    'qty' => $qty,
                    'harga_satuan' => $hargaSatuan,
                    'subtotal' => $subtotal,
                ];
            }
        }

        foreach ($detailPesananData as $detail) {
            DetailPesanan::create($detail);
        }
    }
}
