<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // ✅ ISI DENGAN NAMA TABEL, BUKAN DATABASE
    protected $table = 'pesanan'; // ganti jika nama tabel berbeda

    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'nomor_pesanan',
        'warga_id',
        'total',
        'status',
        'alamat_kirim',
        'rt',
        'rw',
        'metode_bayar'
    ];
}
