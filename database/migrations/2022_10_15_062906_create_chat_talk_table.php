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
        Schema::create('chat_talk', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->smallInteger('department_id')->unsigned()->nullable();
            $table->integer('owner')->nullable();
            $table->timestamp('last_activity', 0)->useCurrent()->useCurrentOnUpdate();
            $table->text('extra')->nullable();
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
        Schema::dropIfExists('chat_talk');
    }
};
