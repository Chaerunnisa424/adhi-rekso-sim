<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';
    public $timestamps = false;

    protected $fillable = [
        'kode_transaksi',
        'tgl_penjualan',
        'id_user',
        'total_bayar'
    ];

    // ========================
    // RELASI KE USER
    // ========================
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // ========================
    // RELASI KE DETAIL PENJUALAN
    // ========================
    public function detailProduk()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }
}
