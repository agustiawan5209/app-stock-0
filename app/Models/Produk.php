<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $fillable = ['kode','kode_fermentasi','jumlah', 'status', 'tgl_kadaluarsa', 'jenis_id'];

    protected $guard = [];

    public function jenis(){
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
}
