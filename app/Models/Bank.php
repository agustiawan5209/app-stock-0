<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    protected $fillable = ['user_id','name_card', 'metode', 'number_rek'];
    protected $hidden = ['user_id', 'metode', 'number_rek'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
