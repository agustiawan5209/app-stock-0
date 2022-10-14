<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuks';
    protected $fillable = [
        'kode', 'pesanan_id','status', 'supplier_id',
    ];
    protected $hidden = ['pesanan_id'];

    public function pesanan(){
        return $this->hasOne(Pesanan::class, 'id', 'pesanan_id');
    }
}
