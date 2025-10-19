<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'umkm';

    // Primary key custom (karena bukan 'id')
    protected $primaryKey = 'umkm_id';

    // Jika primary key bukan tipe UUID
    public $incrementing = true;

    // Tipe data dari primary key
    protected $keyType = 'int';

    // Kolom yang bisa diisi secara massal (fillable)
    protected $fillable = [
        'nama_usaha',
        'pemilik_warga_id',
        'alamat',
        'rt',
        'rw',
        'kategori',
        'kontak',
        'deskripsi',
        'foto_usaha'
    ];

    // Jika kamu pakai timestamps (created_at & updated_at)
    public $timestamps = true;

    // 🔹 Relasi ke tabel lain (opsional, aktifkan kalau sudah ada)
    // public function warga()
    // {
    //     return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    // }

    // public function produk()
    // {
    //     return $this->hasMany(Produk::class, 'umkm_id', 'umkm_id');
    // }
}
