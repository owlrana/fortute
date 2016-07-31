<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_title');
            $table->string('slider_content');
            $table->string('slider_image');
            $table->string('about_tabone');
            $table->string('about_tabtwo');
            $table->string('about_tabthree');
            $table->string('pricing_tabone');
            $table->string('pricing_tabtwo');
            $table->string('pricing_tabthree');

            $table->string('download_backgroundimg');
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
        Schema::drop('contents');
    }
}
