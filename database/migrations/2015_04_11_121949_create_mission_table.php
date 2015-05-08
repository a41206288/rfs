<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('mission_lists', function(Blueprint $table)
        {
            $table->increments('mission_list_id');
            $table->text('mission_name');
            $table->timestamps();
            $table->timestamp('complete_time')->nullable();
        });

		Schema::create('missions', function(Blueprint $table)
		{
			$table->increments('mission_id');
            $table->text('mission_type');
            $table->text('mission_content');
			$table->timestamps();
            $table->timestamp('complete_time')->nullable();
            $table->text('fname');
            $table->text('lname');
            $table->text('phone');
            $table->text('mission_comment')->nullable();
            $table->text('email');
            $table->text('location');
            $table->unsignedInteger('mission_list_id');
            $table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mission');
        Schema::drop('mission_list');
	}

}
