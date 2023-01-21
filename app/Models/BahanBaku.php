<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BahanBaku extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'bahan_bakus';
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
