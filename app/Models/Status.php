<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = ['status', 'pesanan_id', 'jenis', 'ket'];
    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
