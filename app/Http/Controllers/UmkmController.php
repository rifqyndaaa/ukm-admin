<?php
// app/Http/Controllers/UmkmController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        // Data dummy UMKM (tanpa model/database)
        $umkms = [
            [
                'nama_usaha' => 'Toko Lena',
                'pemilik' => 'Lena Mawardah',
                'alamat' => 'Jl. Melati No. 10',
                'kategori' => 'Fashion Hijab',
            ],
            [
                'nama_usaha' => 'Warung Sederhana',
                'pemilik' => 'Budi Santoso',
                'alamat' => 'Jl. Mawar No. 22',
                'kategori' => 'Kuliner',
            ],
            [
                'nama_usaha' => 'Kopi Senja',
                'pemilik' => 'Rizky Putra',
                'alamat' => 'Jl. Kenanga No. 5',
                'kategori' => 'Minuman',
            ],
                [
                'nama_usaha' => 'Kopi arya',
                'pemilik' => 'sukra',
                'alamat' => 'Jl. umban sari No. 5',
                'kategori' => 'minuman dan mkananan',
            ],
        ];


        // Passing ke view
        return view('admin', compact('umkms'));
    }
}
