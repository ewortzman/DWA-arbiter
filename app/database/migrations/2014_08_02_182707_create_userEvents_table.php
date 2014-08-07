<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_events', function($table){
			#Mandatory fields
			$table->integer('user_id')->unsigned();
			$table->integer('event_id')->unsigned();

			#Set foreign keys
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('event_id')->references('id')->on('events');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_events');
	}

}
