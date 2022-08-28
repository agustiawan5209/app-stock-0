<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleId extends Model
{
    use HasFactory;
    protected $table = 'role_ids';
    protected $fillable = [
        'name_role'
    ];
    protected $hidden = [
        'name_role',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'role_id', 'id');
    }

}
