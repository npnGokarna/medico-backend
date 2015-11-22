<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientinformationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patientinformations', function(Blueprint $table) {
		
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
			$table->foreign('patient_id')->references('id')->on('users');
			$table->string('surgical_history');
			$table->string('obstetic_history');
			$table->string('medical_allergy');
			$table->string('family_history');
			$table->string('social_history');
			$table->string('habits');
			$table->string('immunization_history');
			$table->string('development_history');
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
		Schema::drop('patientinformations');
	}

}
