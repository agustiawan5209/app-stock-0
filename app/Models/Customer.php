<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['customer', 'user_id'];
    use HasFactory;

    public function barang()
    {
        return $this->hasOne(BarangKeluar::class, 'customer');
    }
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pesan_customer(){
        return $this->hasOne(PesanCustomer::class, 'customer_id');
    }
}
