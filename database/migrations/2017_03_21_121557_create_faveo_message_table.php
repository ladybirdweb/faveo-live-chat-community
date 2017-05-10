<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaveoMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faveo_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conversation_id');
            $table->string('reply_id');
            
            $table->string('massage');
            $table->string('view');
            
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
        Schema::drop('faveo_massage');    
    }
}
