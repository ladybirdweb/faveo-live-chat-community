<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaveoUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faveo_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uniq_id');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('agent_signature');
            $table->string('profile');
            $table->string('login_id');
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
       Schema::drop('faveo_users'); 
    }
}
