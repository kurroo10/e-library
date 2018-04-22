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
          ['name' => 'admin', 'username' => 'admin' , 'email' => 'ikiw@mailinator.com' , 'password' => bcrypt('admin123')],
      ];

      foreach($users as $user){
          User::create($user);
      }
    }
}
