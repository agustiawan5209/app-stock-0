<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluars';
    protected $fillable = [
        'kode', 'jumlah', 'alamat', 'customer','tgl_keluar','sub_total',
    ];
    protected $hidden = [
        'kode','sub_total', 'tgl_keluar'
    ];

    public function transaksi(){
        return $this->belongsTo(transaksi::class);
    }
}
