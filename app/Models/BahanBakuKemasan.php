<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBakuKemasan extends Model
{
    use HasFactory;
    protected $table = 'bahan_baku_kemasans';
    protected $fillable = [
        'nama_bahan_baku',
    ];
    protected $hidden = [
       'id',
    ];

    public function bahanbakusupplier(){
        return $this->hasMany(BahanBakuSupplier::class);
    }
}
