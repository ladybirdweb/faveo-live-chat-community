<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaveoClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('faveo_client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniq_id');
            $table->string('url_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('ip');
            $table->string('city');
            $table->string('country');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('os');
            $table->string('time_zone');
            $table->string('online_time');
            $table->string('message_time');
            $table->string('view');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('faveo_client');
    }
}
