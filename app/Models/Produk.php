<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = ['kode','jumlah', 'status', 'tgl_kadaluarsa', 'jenis_id'];

    protected $guard = [];
}
