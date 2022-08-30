<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;
    protected $table = 'bahan_bakus';
    protected $fillable = [
        'nama_bahan_baku',
    ];
    protected $hidden = [
        'nama_bahan_baku',
    ];
}
