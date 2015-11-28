<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table) {
			$table->increments('id');
			$table->string('date');
			$table->string('appointment_status');
			$table->integer('doctor_id')->unsigned();
			$table->foreign('doctor_id')->references('id')->on('users');

			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')->references('id')->on('users');

		//	$table->string('doctor_encounter_form');
			$table->integer('patient_encounter_form_id')->unsigned()->unique()->nullable();
			$table->foreign('patient_encounter_form_id')->references('id')->on('patientencounterforms');

			$table->string('doctor_order_form');
			$table->string('medical_report');
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
		Schema::drop('appointments');
	}

}
