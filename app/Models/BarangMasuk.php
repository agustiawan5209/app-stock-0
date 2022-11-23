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

    public function Supplier(){
        return $this->hasOne(Supplier::class, 'id', 'supplier_id');
    }
    public function pesanan(){
        return $this->hasOne(Pesanan::class, 'id', 'pesanan_id');
    }
    public function status($value){
        switch ($value) {
            case '1':
                $msg = "Belum Dikonfirmasi";
                break;
            case '2':
                $msg = "Telah Diverfikasi";
                break;
            case '3':
                $msg = "Dalam pengiriman";
                break;
            case '4':
                $msg = "Barang Diterima";
                break;
            case '5':
                $msg = "Barang Dikonfirmasi";
                break;

            default:
                $msg = "Gagal";
                break;
        }
        return $msg;
    }
}
