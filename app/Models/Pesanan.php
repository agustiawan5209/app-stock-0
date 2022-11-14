<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $fillable = ['bahan_baku_id', 'satuan_id', 'jenis', 'jumlah', 'sub_total', 'transaksi_id'];
    protected $hidden = ['bahan_baku_id', 'satuan_id', 'jenis', 'transaksi_id'];
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }
    public function bahanbaku(){
        return $this->hasOne(BahanBakuSupplier::class, 'id', 'bahan_baku_id');
    }
    public function bahanbakuKemasan(){
        return $this->hasOne(BahanBakuKemasan::class, 'id', 'bahan_baku_id');
    }
    public function barangmasuk(){
        return $this->hasOne(BarangMasuk::class, 'pesanan_id', 'id');
    }

}
