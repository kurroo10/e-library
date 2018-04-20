<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Employee extends Model
{
    protected $primaryKey = 'nip';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
