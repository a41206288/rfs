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

        Schema::create('center_support_people_skills', function(Blueprint $table){
            $table->increments('center_support_people_skill_id');
            $table->unsignedInteger('center_support_person_id');
            $table->unsignedInteger('skill_id');
            $table->timestamps();
        });

        Schema::create('center_support_person_detail_skills', function(Blueprint $table){
            $table->increments('center_support_person_detail_skill_id');
            $table->unsignedInteger('center_support_person_detail_id');
            $table->unsignedInteger('skill_id');
            $table->timestamps();
        });

        Schema::create('user_skills', function(Blueprint $table){
            $table->increments('user_skill_id');
            $table->unsignedInteger('id');
            $table->unsignedInteger('skill_id');
            $table->timestamps();
        });

        Schema::create('role_skills', function(Blueprint $table){
            $table->increments('role_skill_id');
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('skill_id');
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
        Schema::drop('center_support_people_skills');
        Schema::drop('center_support_person_detail_skills');
        Schema::drop('user_skills');
        Schema::drop('role_skills');
	}

}
