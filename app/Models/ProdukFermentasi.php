<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukFermentasi extends Model
{
    use HasFactory;
    protected $table = 'produk_fermentasis';
    protected $fillable = [
        'kode', 'jumlah_stock', 'status', 'tgl_frementasi'
    ];
}
