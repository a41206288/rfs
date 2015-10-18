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
            $table->unsignedInteger('id');
            $table->timestamps();
            $table->timestamp('assign_people_finish_time')->nullable();
            $table->timestamp('arrive_location_time')->nullable();
            $table->timestamp('mission_complete_time')->nullable();
        });

//        Schema::create('mission_new_locations', function(Blueprint $table)
//        {
//            $table->unsignedInteger('mission_new_locations_id');
//            $table->unsignedInteger('mission_list_id');
//            $table->string('location');
//            $table->enum('severe_level', ['輕度', '中度','重度']);
//            $table->text('situation');
//            $table->integer('victim_number');
//            $table->integer('executive_require_people_num');
//            $table->text('executive_require_reason');
//            $table->unsignedInteger('id');
//            $table->timestamp('analysis_time');
//            $table->timestamp('complete_time')->nullable();
//            $table->timestamps();
//        });

        Schema::create('works_ons', function(Blueprint $table)
        {
            $table->increments('works_on_id');
//            $table->unsignedInteger('mission_new_locations_id');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('id');
            $table->enum('status', ['執行中', '已完成']);
            $table->timestamps();
        });

        Schema::create('mission_support_people', function(Blueprint $table)
        {
            $table->increments('mission_support_person_id');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('id'); //roles
            $table->integer('mission_support_people_num');
            $table->string('mission_support_people_reason');
//            $table->integer('local_emt_num');
//            $table->integer('local_reliever_num');
//            $table->integer('center_assign_emt_num')->default(0);
//            $table->integer('center_assign_reliever_num')->default(0);
            $table->timestamps();
        });

//        Schema::create('mission_support_products', function(Blueprint $table)
//        {
//            $table->increments('mission_support_product_id');
//            $table->unsignedInteger('mission_list_id');
//            $table->unsignedInteger('product_total_amount_id');
//            $table->integer('mission_support_product_amount');
//            $table->integer('center_assign_product_amount');
//            $table->integer('resource_assign_product_amount');
//            $table->timestamps();
//        });


        Schema::create('missions', function(Blueprint $table)
        {
            $table->increments('mission_id');
//            $table->text('mission_type');
            $table->text('mission_content');
            $table->timestamps();
            //$table->timestamp('complete_time')->nullable();
            $table->text('fname')->nullable();
            $table->text('lname');
            $table->enum('sex',['男', '女']);
            $table->text('phone')->nullable();
//            $table->text('mission_comment')->nullable();
            $table->text('email')->nullable();
//            $table->text('country_or_city_input');
            //$table->enum('country_or_city', ['縣', '市']);
            $table->text('township_or_district_input');
            //$table->enum('township_or_district', ['鄉', '鎮','區']);
            $table->text('rd_or_st_1')->nullable();
            $table->text('rd_or_st_2')->nullable();
            //道路或街道名稱
            $table->text('location')->nullable();
//            $table->boolean('notice');
            $table->unsignedInteger('mission_list_id');
//            $table->unsignedInteger('mission_new_locations_id');
//            $table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
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
//        Schema::drop('mission_support_products');
//        Schema::drop('mission_new_locations');
        Schema::drop('works_ons');
    }

}
