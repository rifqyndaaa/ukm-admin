<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UlasanProduk;
use Illuminate\Support\Str;

class UlasanProdukSeeder extends Seeder
{
    public function run()
    {
        $komentarSample = [
            'Produk sangat bagus dan berkualitas',
            'Produk sesuai deskripsi',
            'Lumayan, pengiriman agak lama',
            'Sangat puas dengan pembelian',
            'Kualitas produk kurang memuaskan',
            'Pelayanan cepat dan ramah',
            'Tidak sesuai harapan',
            'Harga sesuai dengan kualitas',
            'Produk original dan bagus',
            'Pengiriman cepat',
        ];

        $totalProduk = 10; // jumlah produk yang tersedia
        $totalPelanggan = 20; // jumlah pelanggan yang tersedia

        $ulasanData = [];

        for ($i = 1; $i <= 100; $i++) {
            $ulasanData[] = [
                'produk_id' => rand(1, $totalProduk),
                'pelanggan_id' => rand(1, $totalPelanggan),
                'rating' => rand(1, 5),
                'komentar' => $komentarSample[array_rand($komentarSample)],
            ];
        }

        UlasanProduk::insert($ulasanData);
    }
}
