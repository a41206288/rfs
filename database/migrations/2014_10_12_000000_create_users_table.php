<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_name');
			$table->string('email')->unique();
			$table->string('password', 60);
//            $table->unsignedInteger('mission_id');
//            $table->unsignedInteger('mission_list_id');
            $table->string('phone');
			$table->text('skill');
			$table->text('country_or_city_input');
			$table->text('township_or_district_input');
			$table->boolean('arrived');
			$table->rememberToken();
			$table->timestamps();
		});

		Schema::create('victim_details', function(Blueprint $table){
			$table->increments('victim_detail_id');
			$table->unsignedInteger('mission_list_id')->nullable();
			$table->string('name')->nullable();
			$table->integer('age')->nullable();
			$table->enum('sex', ['男','女','其他']);
			$table->string('person_id')->unique()->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->enum('damage_level', [0,1,2,3,4])->nullable();
			$table->text('damage_detail')->nullable();
			$table->text('now_location')->nullable();
			$table->text('disposal')->nullable();
			$table->timestamp('disposal_finish_time')->nullable();
			$table->timestamps();
			//$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
		Schema::drop('victim_details');
	}

}
