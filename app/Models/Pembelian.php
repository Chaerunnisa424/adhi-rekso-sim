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
        'id_supplier',  // <-- ini harus sesuai nama kolom di DB
        'catatan',
        'total_bayar',
    ];

    public $timestamps = true;

    // Relasi ke supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }

    // Relasi ke detail pembelian
    public function detail()
    {
        return $this->hasMany(DetailPembelian::class, 'id_pembelian');
    }
}
