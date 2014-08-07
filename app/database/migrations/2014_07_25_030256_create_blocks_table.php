<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blocks', function($table){
			$table->increments('id');

			#Mandatory fields
			$table->integer('user_id')->unsigned();
			$table->dateTime('start');
			$table->dateTime('end');

			#Optional fields
			$table->text('note')->nullable();

			#Set foreign keys
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
		Schema::drop('blocks');
		//
	}

}
