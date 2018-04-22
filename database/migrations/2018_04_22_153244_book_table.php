<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('books', function (Blueprint $table) {
        $table->increments('id');
        $table->bigInteger('isbn');
        $table->string('title');
        $table->string('author')->nullable();
        $table->string('publisher')->nullable();
        $table->string('year')->nullable();
        $table->string('image')->nullable();
        $table->string('file')->nullable();
        $table->string('description')->nullable();
        $table->unsignedInteger('class_id');
        $table->unsignedInteger('curriculumn_id');
        $table->timestamps();

        $table->foreign('class_id')->references('id')->on('classes');
        $table->foreign('curriculumn_id')->references('id')->on('curriculumns');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('books');
    }
}
