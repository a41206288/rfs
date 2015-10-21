<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('skills', function(Blueprint $table){
            $table->increments('skill_id');
            $table->text('skill_name');
            $table->timestamps();

        });

        Schema::create('skill_support_people', function(Blueprint $table){
            $table->increments('id');
            $table->integer('support_people_id');
            $table->integer('skill_id');
            $table->timestamps();
        });

        Schema::create('skill_users', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('skill_id');
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
        Schema::drop('skills');
        Schema::drop('skill_support_people');
        Schema::drop('skill_users');
	}

}
