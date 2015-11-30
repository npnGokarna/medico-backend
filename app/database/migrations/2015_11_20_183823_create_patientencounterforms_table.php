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

			$table->integer('appointment_id')->unsigned()->unique();
			$table->foreign('appointment_id')->references('id')->on('appointments');

			//$table->string('appointment_id');
			$table->string('chief_complaint');
			$table->string('summary_of_illness');
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
		Schema::drop('patientencounterforms');
	}

}
