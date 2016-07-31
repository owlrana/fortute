<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Student extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->unsigned();
            $table->string('gender');
            $table->string('dob');
            $table->string('grade');
            $table->string('subjects');
            $table->string('days');
            $table->string('times');
            $table->string('location');
            $table->timestamps();

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    
    
    public function down()
    {
        Schema::drop('students');
    }
   
}
