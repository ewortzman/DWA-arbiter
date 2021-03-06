<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_roles', function($table){
			$table->increments('id');

			#Mandatory fields
			$table->integer('user_id')->unsigned();
			$table->integer('association_id')->unsigned()->nullable();
			$table->enum('role', array('Athletic Director', 'Coach', 'Commissioner', 'Official'));

			#Set foreign keys
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('association_id')->references('id')->on('associations');
			
			#Set unique index
			$table->unique(array('user_id','association_id', 'role'));
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
		Schema::drop('user_roles');
		//
	}

}
