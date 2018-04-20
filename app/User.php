<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use App\Models\Employee;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function saveUser($param)
    {
      try {
        DB::beginTransaction();
        $user = new User;
        $user->name     = $param['name'];
        $user->username = $param['username'];
        $user->email    = $param['email'];
        $user->password = bcrypt($param['password']);

        $user->save();

        $employee = new Employee;
        $employee->nip = $param['nip'];
        $employee->name = $param['name'];
        $employee->gender = $param['gender'];
        $employee->user_id = $user->id;

        $employee->save();


        DB::commit();

        $response = true;

      } catch (\Exception $e) {
        DB::rollback();
        $response = false;
      }

      return $response;

    }

    public static function updateUser($param,$employee)
    {
      try {
        DB::beginTransaction();
        $user = User::find($employee->user_id);
        $user->name     = $param['name'];
        $user->username = $param['username'];
        $user->email    = $param['email'];

        $user->save();

        $employee = Employee::find($employee->nip);
        $employee->nip = $param['nip'];
        $employee->name = $param['name'];
        $employee->gender = $param['gender'];

        $employee->save();


        DB::commit();

        $response = true;

      } catch (\Exception $e) {
        DB::rollback();
        $response = false;
      }

      return $response;

    }
}
