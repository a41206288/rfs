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
            $table->unsignedInteger('product_total_amount_id');
            $table->integer('amount');
            $table->string('lname');
            $table->string('fname');
            $table->string('email')->unique();
            $table->string('phone');
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

        Schema::create('interviews', function(Blueprint $table){
            $table->increments('interview_id');
            $table->integer('interview_goal');
            $table->timestamps();
        });

        Schema::create('interviewers', function(Blueprint $table){
            $table->increments('interviewer_id');
            $table->string('interview_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->unsignedInteger('interview_id');
            $table->text('skill');
            $table->timestamps();
            //$table->foreign('interviewer_id')->references('interviewer_id')->on('interviews');
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
        Schema::drop('buys');
        Schema::drop('companies');
        Schema::drop('interviews');
        Schema::drop('interviewers');
	}

}
