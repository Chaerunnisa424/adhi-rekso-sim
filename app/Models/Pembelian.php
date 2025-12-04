<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id_pembelian';

    protected $fillable = [
        'kode_transaksi',
        'tgl_pembelian',
        'supplier',
        'catatan',
        'total_bayar',
    ];

    public $timestamps = true; // Kalau kolom created_at dan updated_at ada

    public function detail()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian');
    }
}
