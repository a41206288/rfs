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
            $table->text('fname')->nullable();
            $table->text('lname');
            $table->text('phone')->nullable();
            $table->text('mission_comment')->nullable();
            $table->text('email')->nullable();
            $table->text('country_or_city_input');
            $table->enum('country_or_city', ['縣', '市']);
            $table->text('township_or_district_input');
            $table->enum('township_or_district', ['鄉', '鎮','區']);
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
        Schema::drop('missions');
        Schema::drop('mission_lists');
    }

}
