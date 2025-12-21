<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Warga;

class UlasanProduk extends Model
{
    use HasFactory;

    protected $table = 'ulasan_produk';
    protected $primaryKey = 'ulasan_id';

    // Fillable fields
    protected $fillable = [
        'produk_id',
        'warga_id',
        'rating',
        'komentar',
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
    }
}
