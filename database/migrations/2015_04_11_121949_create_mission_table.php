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

        Schema::create('mission_new_locations', function(Blueprint $table)
        {
            $table->increments('mission_new_locations_id');
            $table->unsignedInteger('mission_list_id');
            $table->string('location');
            $table->enum('severe_level', ['輕度', '中度','重度']);
            $table->text('situation');
            $table->integer('victim_number');
            $table->timestamp('analysis_time');
            $table->timestamps();
        });

        Schema::create('works_ons', function(Blueprint $table)
        {
            $table->increments('works_on_id');
            $table->unsignedInteger('mission_new_locations_id');
            $table->unsignedInteger('id');
            $table->timestamps();
        });

        Schema::create('mission_support_people', function(Blueprint $table)
        {
            $table->increments('mission_support_person_id');
            $table->unsignedInteger('mission_list_id');
            $table->integer('emt_num');
            $table->integer('reliever_num');
            $table->timestamps();
        });

        Schema::create('mission_support_products', function(Blueprint $table)
        {
            $table->increments('mission_support_product_id');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('product_total_amount_id');
            $table->integer('amount');
            $table->timestamps();
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
            //$table->enum('country_or_city', ['縣', '市']);
            $table->text('township_or_district_input');
            //$table->enum('township_or_district', ['鄉', '鎮','區']);
            $table->text('location');
            $table->boolean('notice');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('mission_new_locations');
            $table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
        });

        Schema::create('reports', function(Blueprint $table)
        {
            $table->increments('report_id');
            $table->text('report_content');
            $table->timestamps();
            $table->unsignedInteger('mission_list_id');
            //$table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
        });

        Schema::create('local_reports', function(Blueprint $table)
        {
            $table->increments('local_report_id');
            $table->text('local_report_content');
            $table->timestamps();
            $table->unsignedInteger('mission_new_locations_id');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('id');
            //$table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
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
        Schema::drop('reports');
        Schema::drop('local_reports');
        Schema::drop('mission_support_people');
        Schema::drop('mission_support_products');
        Schema::drop('mission_new_locations');
        Schema::drop('works_ons');
    }

}
