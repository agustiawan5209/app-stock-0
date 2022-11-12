<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBahanBakuKemasan extends Model
{
    use HasFactory;
    protected $table = 'stock_bahan_baku_kemasans';
    protected $fillable = [
        'bahan_baku_id','stock', 'satuan_id', 'jenis_id', 'max'
    ];
    public function bahanbaku(){
        return $this->hasOne(BahanBakuKemasan::class, 'id', 'bahan_baku_id');
    }
    public function jenis(){
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
    public function satuan(){
        return $this->hasOne(Satuan::class, 'id', 'satuan_id');
    }
}
