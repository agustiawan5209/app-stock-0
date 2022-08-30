<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $fillable = ['kode_transaksi','bukti_transaksi', 'tgl_transaksi'];
    protected $hidden = ['kode_transaksi','bukti_transaksi', 'tgl_transaksi'];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
