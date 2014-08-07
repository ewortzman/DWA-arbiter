<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_notes', function($table){
			#Mandatoy fields
			$table->integer('event_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->text('note');

			#Set foreign keys
			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::drop('event_notes');
		//
	}

}
