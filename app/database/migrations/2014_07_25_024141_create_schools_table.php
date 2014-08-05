<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function($table){
			#Primary Key
			$table->increments('id');
			#Timestamps (created_at, updated_at)
			$table->timestamps();

			#Mandatory fields
			$table->string('name');
			$table->string('street');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->integer('AD')->unsigned();

			#Set foreign keys
			$table->foreign('AD')->references('id')->on('users');
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
		Schema::drop('schools');
		//
	}

}
