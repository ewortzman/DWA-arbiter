<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			#Primary Key
			$table->increments('id');
			#Timestamps (created_at, updated_at)
			$table->timestamps();

			#Mandatory fields
			$table->string('email')->unique(); #used as username
			$table->string('first');
			$table->string('last');
			$table->string('address');
			$table->string('password');
			$table->rememberToken();

			#Optional fields
			$table->string('phone')->nullable();
			$table->tinyInteger('experience')->nullable();
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
		Schema::drop('users');
		//
	}

}
