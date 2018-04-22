<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;

class Student extends Model
{
  protected $primaryKey = 'nisn';

  public function user()
  {
      return $this->belongsTo(User::class,'user_id');
  }

  public function class()
  {
      return $this->belongsTo(Classes::class,'class_id');
  }

  public static function saveStudent($param, $student = null)
  {
    try {
      DB::beginTransaction();
      if ($student) {
        $user = User::find($student->user_id);
      }else {
        $user = new User;
        $user->password = bcrypt($param['password']);
      }
      $user->name     = $param['name'];
      $user->username = $param['username'];
      $user->email    = $param['email'];

      $user->save();
      if ($student) {
        $student = Student::find($student->nisn);
      }else {
        $student = new Student;
      }
      $student->nisn = $param['nisn'];
      $student->name = $param['name'];
      $student->gender = $param['gender'];
      $student->religion = $param['religion'];
      $student->address = $param['address'];
      $student->email = $param['email'];
      $student->phone = $param['phone'];
      $student->user_id = $user->id;
      $student->class_id = $param['class']->id;

      $student->save();


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
