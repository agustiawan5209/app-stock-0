<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = ['supplier', 'user_id'];
    use HasFactory;

    public function bahan_bakus(){
        return $this->hasMany(BahanBakuSupplier::class, 'suppliers_id');
    }
    public function bahan_baku_kemasan(){
        return $this->hasMany(BahanBakuSupplier::class, 'suppliers_id');
    }
    public function barang()
    {
        return $this->hasOne(BarangMasuk::class, 'supplier_id');
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
