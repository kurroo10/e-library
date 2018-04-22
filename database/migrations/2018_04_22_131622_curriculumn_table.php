<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurriculumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('curriculumns', function (Blueprint $table) {
        $table->increments('id');
        $table->string('slug');
        $table->string('name');
        $table->unsignedInteger('class_id');
        $table->timestamps();

        $table->foreign('class_id')->references('id')->on('classes');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('curriculumns');

    }
}
