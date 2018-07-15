<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\User;

class ContentReport extends Model
{
    protected $table = 'content_reports';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class,'book_id');
    }
}
