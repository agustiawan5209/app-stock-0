<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProduk extends Model
{
    use HasFactory;
    protected $table = 'stok_produks';
    protected $fillable = ['jenis', 'tgl_permintaan','jumlah','jumlah_produksi'];
    protected $guard = [];
}
