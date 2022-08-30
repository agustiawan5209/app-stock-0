<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['bahan_baku_id', 'satuan_id', 'jenis_id', 'jumlah', 'sub_total', 'transaksi_id'];
    protected $hidden = ['bahan_baku_id', 'satuan_id', 'jenis_id', 'transaksi_id'];
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }
}
