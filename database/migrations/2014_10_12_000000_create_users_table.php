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
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->unsignedInteger('mission_id');
            $table->unsignedInteger('mission_list_id');
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
			$table->string('fname');
			$table->string('lname');
			$table->integer('age');
			$table->string('person_id')->unique();
			$table->string('phone');
			$table->string('address');
			$table->enum('damage_level', ['輕度', '中度','重度','正常']);
			$table->text('damage_detail');
			$table->text('now_location');
			$table->text('disposal');
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
