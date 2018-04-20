<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Employee extends Model
{
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nip', 'name', 'gender', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
