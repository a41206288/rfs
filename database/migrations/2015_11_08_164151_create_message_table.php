<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('messages', function(Blueprint $table){
            $table->increments('message_id');
            $table->text('message_content');
            $table->unsignedInteger('chat_room_id');
            $table->unsignedInteger('user_id');
            $table->boolean('read');
            $table->timestamps();
        });

        Schema::create('chat_rooms', function(Blueprint $table){
            $table->increments('chat_room_id');
            $table->unsignedInteger('user_id_1');
            $table->unsignedInteger('user_id_2');
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
        Schema::drop('messages');
        Schema::drop('chat_rooms');
	}

}
