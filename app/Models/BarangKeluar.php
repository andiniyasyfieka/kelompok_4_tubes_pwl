<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $table = 'barang_keluar';

    protected $fillable = [
        'id_transaksi',
        'tanggal',
        'id_barang',
        'nama_barang',
        'jumlah_keluar',
    ];
}
