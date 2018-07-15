<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Book extends Model
{
  public function class()
  {
      return $this->belongsTo(Classes::class,'class_id');
  }

  public function curriculumn()
  {
      return $this->belongsTo(Curriculumn::class,'curriculumn_id');
  }

  public static function saveBook($param,$id = null)
  {
    try {
      DB::beginTransaction();
      if ($id) {
        $book = Book::find($id);
      }else {
        $book = new Book;
      }
      $book->isbn           = $param['isbn'];
      $book->title          = $param['title'];
      $book->author         = $param['author'];
      $book->publisher      = $param['publisher'];
      $book->year           = $param['year'];
      $book->image          = isset($param['image']) ? $param['image'] : $book->image;
      $book->file           = isset($param['pdf']) ? $param['pdf'] : $book->file;
      $book->description    = $param['description'];
      $book->class_id       = $param['class']->id;
      $book->curriculumn_id = $param['curriculumn'];

      $book->save();

      DB::commit();

      $response = true;

    } catch (\Exception $e) {
      DB::rollback();
      $response = false;
    }

    return $response;
  }
}
