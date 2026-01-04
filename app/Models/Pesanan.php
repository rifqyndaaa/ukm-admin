<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'nomor_pesanan',
        'warga_id',
        'total',
        'status',
        'alamat_kirim',
        'rt',
        'rw',
        'metode_bayar',
    ];

    // DETAIL PESANAN
    public function detailPesanan()
    {
        return $this->hasMany(
            DetailPesanan::class,
            'pesanan_id',
            'pesanan_id'
        );
    }

    // MEDIA / BUKTI PEMBAYARAN
    public function media()
    {
        return $this->hasMany(
            Media::class,
            'ref_id',
            'pesanan_id'
        )->where('ref_table', 'pesanan');
    }
}
