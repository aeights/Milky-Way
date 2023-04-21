<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nama',
    //     'harga',
    //     'gambar',
    //     'berat',
    //     'kategori',
    //     'stok',
    //     'detail_produk'
    // ];

    protected $guarded = [
        'id',
    ];
}
