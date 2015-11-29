<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicalreportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('medicalreports', function(Blueprint $table) {
			$table->increments('id');
			$table->string('appointment_id');
			$table->string('bloodpressure');
			$table->string('bodytemperature');
			$table->string('heartbeat');
			$table->string('bloodsugerlevel');
			$table->string('airflow');
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
		Schema::drop('medicalreports');
	}

}
