<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaveoConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('faveo_conversation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conversation_id');
            $table->string('client_id');
            $table->string('conversation_time');
          
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
        Schema::drop('faveo_conversation');
    }
}
