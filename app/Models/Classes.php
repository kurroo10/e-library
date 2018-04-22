<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Classes extends Model
{
    protected $table = 'classes';

    public static function saveClass($param,$id = null)
    {
      try {
        DB::beginTransaction();
        if ($id) {
          $class = Classes::find($id);
        }else {
          $class = new Classes;
        }
        $class->slug     = $param['class'];
        $class->name     = $param['class'];

        $class->save();

        DB::commit();

        $response = true;

      } catch (\Exception $e) {
        DB::rollback();
        $response = false;
      }

      return $response;
    }
}
