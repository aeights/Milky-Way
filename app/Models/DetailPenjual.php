<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjual extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'user_id',
    //     'nama_toko',
    //     'alamat_toko',
    //     'deskripsi_toko'
    // ];

    protected $guarded = [
        'id',
    ];
}
