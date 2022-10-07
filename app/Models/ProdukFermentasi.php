<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukFermentasi extends Model
{
    use HasFactory;
    protected $table = 'produk_fermentasis';
    protected $fillable = ['kode', 'jumlah_stock', 'status', 'tgl_frementasi', 'jumlah_hari'];


    protected  function  getStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value == 1 ? 'Tahap Fermentasi' : 'Fermentasi Selesai',
        );
    }
    public function getFermentasi($value){
        if($value == 1){
            $string = 'Tahap Fermentasi';
        }else if($value ==2){
            $string ='Fermentasi Selesai';
        }else if($value ==3){
            $string ='Produk Siap Jual';
        }
        return $string;
    }
}
