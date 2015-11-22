<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorordersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctororders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('appointment_id');
			$table->string('symptoms');
			$table->string('diagnosis');
			$table->string('medicine_prescribed');
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
		Schema::drop('doctororders');
	}

}
