<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengemasanBarang extends Model
{
    use HasFactory;
    protected $table = 'pengemasan_barangs';
    protected $fillable = [
        'jenis_produk','kode', 'jumlah', 'tgl_pengemasan', 'nama_jenis'
    ];

    public function produksi(){
        return $this->hasOne(Jenis::class, 'id','jenis_produk');
    }
}
