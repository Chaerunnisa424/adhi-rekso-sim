<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    public $timestamps = false; // kalau tidak ada created_at & updated_at

    protected $fillable = [
        'nama_supplier',
        'alamat',
        'no_telp'
    ];
}
