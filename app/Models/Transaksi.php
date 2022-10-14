<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = ['ID_transaksi','metode', 'tgl_transaksi' ,'bukti_transaksi','keterangan'];
    protected $hidden = ['ID_transaksi','metode', 'tgl_transaksi' ,'bukti_transaksi','keterangan'];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
