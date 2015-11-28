<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password');
			$table->string('address');
			$table->string('phone');
			$table->string('fullname');
			$table->string('dateofbirth');
			$table->string('ssn');
			$table->string('gender');
			$table->string('photourl');
			$table->string('email')->unique();
			$table->string('usertype');
			$table->string('familydocotorname');
			$table->string('remember_token');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	Schema::drop('users');
	}

}
