<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuSupplier extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_suppliers';
    protected $fillable = ['gambar','bahan_baku_id','satuan' ,'isi', 'harga','jumlah_stock', 'suppliers_id'];

    public function supplier()
    {
        return $this->belongsTo(Suppliers::class, 'suppliers_id');
    }
    public function bahanbakus(){
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id', 'id');
    }
    public function barang_masuk()
    {
        return $this->hasOne(BarangMasuk::class, 'bahan');
    }
}
