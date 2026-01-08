<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $table = 'detail_pembelian';
    protected $primaryKey = 'id_detail';
    public $timestamps = true; // karena ada created_at dan updated_at

    protected $fillable = [
        'id_pembelian',
        'id_produk',
        'kode_produk',
        'jumlah',
        'harga_beli',
        'subtotal'
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'id_pembelian');
    }
}

