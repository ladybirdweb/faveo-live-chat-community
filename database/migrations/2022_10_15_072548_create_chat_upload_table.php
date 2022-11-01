<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_upload', function (Blueprint $table) {
            $table->id();
            $table->integer('message_id')->unsigned();
            $table->string('state');
            $table->text('files_into')->nullable();
            $table->integer('size')->unsigned()->nullable();
            $table->integer('progress')->unsigned()->nullable();
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
        Schema::dropIfExists('chat_upload');
    }
};
