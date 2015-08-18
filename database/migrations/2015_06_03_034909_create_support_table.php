<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('product_total_amounts', function(Blueprint $table){
            $table->increments('product_total_amount_id');
            $table->string('product_name');
            $table->string('unit');
            $table->timestamps();
        });

        Schema::create('local_safe_amounts', function(Blueprint $table){
            $table->increments('local_safe_amount_id');
            $table->unsignedInteger('mission_list_id');
            $table->unsignedInteger('product_total_amount_id');
            $table->integer('safe_amount');
            $table->integer('amount');
            $table->timestamps();
            //$table->foreign('mission_list_id')->references('mission_list_id')->on('mission_lists');
            //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
        });

        Schema::create('donates', function(Blueprint $table){
        $table->increments('donate_id');
        $table->string('lname');
        $table->string('fname');
        $table->string('email');//->unique()
        $table->string('phone');
        $table->timestamps();
        //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
    });

        Schema::create('donate_products', function(Blueprint $table){
            $table->increments('donate_product_id');
            $table->unsignedInteger('donate_id');
            $table->integer('donate_amount');
            $table->unsignedInteger('product_total_amount_id');
            $table->boolean('arrived');
            $table->timestamps();
            //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
        });

        Schema::create('center_support_products', function(Blueprint $table){
            $table->increments('center_support_product_id');
            $table->unsignedInteger('product_total_amount_id');
            $table->integer('center_support_product_amount');
            $table->timestamps();
            //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
        });

        Schema::create('center_support_product_modifies', function(Blueprint $table){
            $table->increments('center_support_product_modify_id');
            $table->unsignedInteger('product_total_amount_id');
            $table->integer('modify_amount');
            $table->integer('old_amount');
            $table->unsignedInteger('id');
            $table->timestamps();
            //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
        });

        Schema::create('buys', function(Blueprint $table){
            $table->increments('buy_id');
            $table->unsignedInteger('donate_id');
            $table->unsignedInteger('product_total_amount_id');
            $table->unsignedInteger('company_id');
            $table->timestamps();
            //$table->foreign('donate_id')->references('donate_id')->on('donates');
            //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
            //$table->foreign('company_id')->references('company_id')->on('companies');
        });

        Schema::create('companies', function(Blueprint $table){
            $table->increments('company_id');
            $table->unsignedInteger('donate_id');
            $table->string('phone');
            $table->string('address');
            $table->timestamps();
            //$table->foreign('donate_id')->references('donate_id')->on('donates');
        });

        Schema::create('center_support_people', function(Blueprint $table){
            $table->increments('center_support_person_id');
            $table->integer('center_support_person_num');
            $table->integer('called_person_num');
            $table->text('center_support_person_requirement');
            $table->timestamps();
        });

        Schema::create('center_support_person_details', function(Blueprint $table){
            $table->increments('center_support_person_detail_id');
            $table->string('center_support_person_detail_name');
            $table->string('email');//->unique()
            $table->string('phone');
            $table->unsignedInteger('center_support_person_id');
            $table->text('skill');
            $table->text('country_or_city_input');
            $table->text('township_or_district_input');
            $table->timestamps();
            //$table->foreign('interviewer_id')->references('interviewer_id')->on('interviews');
        });

        Schema::create('center_support_person_modifies', function(Blueprint $table){
        $table->increments('center_support_person_modify_id');
        $table->text('center_support_person_requirement');
        $table->integer('modify_num');
        $table->integer('old_num');
        $table->timestamps();
        //$table->foreign('product_total_amount_id')->references('product_total_amount_id')->on('product_total_amounts');
    });

        Schema::create('modifies', function(Blueprint $table){
            $table->increments('modify_id');
            $table->text('old_value');
            $table->text('modify_value');
            $table->string('table_name');
            $table->string('attribute_name');
            $table->unsignedInteger('id');
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
        Schema::drop('product_total_amounts');
        Schema::drop('local_safe_amounts');
        Schema::drop('donates');
        Schema::drop('donate_products');
        Schema::drop('center_support_products');
        Schema::drop('center_support_product_modifies');
        Schema::drop('buys');
        Schema::drop('companies');
        Schema::drop('center_support_people');
        Schema::drop('center_support_person_details');
        Schema::drop('center_support_person_modifies');
        Schema::drop('modifies');
//        Schema::drop('interviews');
//        Schema::drop('interviewers');

	}

}
