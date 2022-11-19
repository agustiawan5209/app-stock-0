<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananUser extends Model
{
    use HasFactory;
    protected $table = 'pesanan_users';
    protected $fillable = [
        'user_id', 'transaksi_id', 'jenis_id', 'jumlah', 'sub_total', 'status', 'ket'
    ];
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id', 'transaksi_id');
    }
    public function jenis()
    {
        return $this->hasOne(Jenis::class, 'id', 'jenis_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function statusJenis($value)
    {
        switch ($value) {
            case '1':
                $msg = "Belum Dikonfirmasi";
                break;
            case '2':
                $msg = "Telah Di konfirmasi!";
                break;
            case '3':
                $msg = "Dalam Pengiriman.";
                break;
            case '4':
                $msg = "Butuh Konfirmasi Penerimaan Pengguna!";
                break;
            case '5':
                $msg = "Telah Diterima!";
                break;

            default:
                $msg = "Error";
                break;
        }
        return $msg;
    }
}
