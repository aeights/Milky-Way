<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencatatan extends Model
{
    use HasFactory;

    protected $table = 'pencatatan';

    protected $guarded = [
        'id'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
