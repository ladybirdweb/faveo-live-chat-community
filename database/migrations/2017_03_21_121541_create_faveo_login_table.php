<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaveoLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('faveo_login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('user_name');
            $table->string('email');

            $table->string('password');
            $table->string('message');
            $table->string('role');
            $table->string('status');
            $table->string('online_time');
            $table->string('created_by');
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
          Schema::drop('faveo_login');  
            }
}
