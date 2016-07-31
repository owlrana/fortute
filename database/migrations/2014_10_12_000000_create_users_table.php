<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('profile_image');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('password');
            $table->integer('user_type_id')->unsigned();
            $table->string('gender');
            $table->string('dob');
            $table->string('address');
            $table->string('device_id');
            $table->string('device_type');
            $table->string('gcm_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**$device_id = $content->device_id;
            $device_type = $content->device_type;
            $gcm_id = $content->gcm_id;
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
