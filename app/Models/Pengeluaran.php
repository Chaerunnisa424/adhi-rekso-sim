<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    public $timestamps = false; // tabel tidak punya created_at updated_at

    protected $fillable = [
        'tgl_pengeluaran',
        'kategori',
        'keterangan',
        'nominal',
    ];
}
