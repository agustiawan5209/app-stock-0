<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuSupplier extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_suppliers';
    protected $fillable = ['gambar','bahan_baku','satuan' ,'isi', 'harga','jumlah_stock', 'suppliers_id'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }
    public function barang_masuk()
    {
        return $this->hasOne(BarangMasuk::class, 'bahan');
    }
    public function bahanbaku(){
        return $this->hasOne(BahanBaku::class, 'id', 'bahan_baku');
    }
}
