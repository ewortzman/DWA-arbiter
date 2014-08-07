<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teams', function($table){
			#Primary Key
			$table->increments('id');
			#Timestamps (created_at, updated_at)
			$table->timestamps();

			#Mandatory fields
			$table->integer('sport_id')->unsigned();
			$table->integer('school_id')->unsigned();
			$table->string('name');
			$table->string('level');
			$table->enum('gender', array('boys', 'girls', 'coed'));

			#Set foreign keys
			$table->foreign('sport_id')->references('id')->on('sports');
			$table->foreign('school_id')->references('id')->on('schools');
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teams');
		//
	}

}
