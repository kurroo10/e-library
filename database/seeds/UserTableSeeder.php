<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = [
          ['name' => 'admin', 'username' => 'admin' , 'email' => 'ikiw@mailinator.com' , 'password' => bcrypt('admin123'), 'is_admin' => true],
          ['name' => 'user', 'username' => 'user' , 'email' => 'userlibrary@mailinator.com' , 'password' => bcrypt('user123'), 'is_admin' => false],
      ];

      foreach($users as $user){
          User::create($user);
      }
    }
}
