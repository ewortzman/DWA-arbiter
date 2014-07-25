<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTeamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_teams', function($table){
			#Mandatory fields
			$table->integer('event_id')->unsigned();
			$table->integer('team_id')->unsigned();
			$table->boolean('home');

			#Set primary key
			$table->primary(array('event_id', 'team_id'));

			#Set foreign keys
			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('team_id')->references('id')->on('teams');
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
		Schema::drop('event_teams');
		//
	}

}
