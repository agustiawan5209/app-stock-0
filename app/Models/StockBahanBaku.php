<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBahanBaku extends Model
{
    use HasFactory;
    protected $table = 'stock_bahan_bakus';
    protected $fillable = [
        'bahan_baku_id','stock', 'satuan_id', 'jenis_id', 'max'
    ];
    protected $hidden = [
        'bahan_baku_id', 'satuan_id', 'jenis_id'
    ];
    public function bahanbaku(){
        return $this->hasOne(BahanBaku::class, 'id', 'bahan_baku_id');
    }
    public function jenis(){
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
    public function satuan(){
        return $this->hasOne(Satuan::class, 'id', 'satuan_id');
    }
}
