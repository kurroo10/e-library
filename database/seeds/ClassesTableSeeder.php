<?php

use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $classes = [
          ['slug' => '7', 'name' => '7'],
          ['slug' => '8', 'name' => '8'],
          ['slug' => '9', 'name' => '9'],
      ];

      foreach($classes as $class){
          Classes::create($class);
      }
    }
}
