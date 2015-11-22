<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientencounterformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patientencounterforms', function(Blueprint $table) {
			$table->increments('id');
			$table->string('appointment_id');
			$table->string('chief_complaint');
			$table->string('summary_of_examination');
			$table->string('assessment_plan');
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
		Schema::drop('patientencounterforms');
	}

}
