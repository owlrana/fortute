<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Qualification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('qualifications');
            $table->string('tenth_marks');
            $table->string('twelfth_marks');
            $table->string('college');
            $table->string('course');
            $table->string('batch');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * user_id, user_type_id, name, email, mobile, dob, gender, address, id_proof
[11:18 PM, 6/30/2016] Pranav Mittal: password
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('qualifications');
    }
}
