<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table){
			#Primary Key
			$table->increments('id');
			#Timestamps (created_at, updated_at)
			$table->timestamps();

			#Mandatory fields
			$table->integer('sport_id')->unsigned();
			$table->string('location');
			$table->string('type');
			$table->dateTime('start');
			$table->dateTime('end');
			$table->float('fee');

			#Set foreign keys
			$table->foreign('sport_id')->references('id')->on('sports');
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
		Schema::drop('events');
		//
	}

}
