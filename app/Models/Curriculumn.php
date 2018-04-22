<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Curriculumn extends Model
{
  public function class()
  {
      return $this->belongsTo(Classes::class,'class_id');
  }

  public static function saveCurriculumn($param,$id = null)
  {
    try {
      DB::beginTransaction();
      if ($id) {
        $curriculumn = Curriculumn::find($id);
      }else {
        $curriculumn = new Curriculumn;
      }
      $curriculumn->slug       = strtolower($param['name']);
      $curriculumn->name       = $param['name'];
      $curriculumn->class_id   = $param['class']->id;

      $curriculumn->save();

      DB::commit();

      $response = true;

    } catch (\Exception $e) {
      dd($e);
      DB::rollback();
      $response = false;
    }

    return $response;
  }
}
