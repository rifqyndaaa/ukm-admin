<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    protected $primaryKey = 'umkm_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'nama_usaha',
        'pemilik_warga_id',
        'alamat',
        'rt',
        'rw',
        'kategori',
        'kontak',
        'deskripsi',
        'foto_usaha',
    ];

    // ================================
    // 🔗 RELASI KE TABEL WARGA
    // ================================
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    // ================================
    // 🔗 RELASI PRODUK
    // ================================
    public function produk()
    {
        return $this->hasMany(Produk::class, 'umkm_id', 'umkm_id');
    }

    // ================================
    // 🔗 RELASI MEDIA (YANG DIMINTA)
    // ================================
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'umkm_id')
            ->where('ref_table', 'umkm')
            ->orderBy('sort_order', 'ASC');
    }

    // ================================
    // OPTIONAL: GET MEDIA BERDASARKAN CAPTION
    // ================================
    public function fotoUsaha()
    {
        return $this->hasOne(Media::class, 'ref_id', 'umkm_id')
            ->where('ref_table', 'umkm')
            ->where('caption', 'foto_usaha');
    }

    public function dokumenIzin()
    {
        return $this->hasOne(Media::class, 'ref_id', 'umkm_id')
            ->where('ref_table', 'umkm')
            ->where('caption', 'dokumen_izin');
    }

    public function bannerPromosi()
    {
        return $this->hasOne(Media::class, 'ref_id', 'umkm_id')
            ->where('ref_table', 'umkm')
            ->where('caption', 'banner_promosi');
    }
}
