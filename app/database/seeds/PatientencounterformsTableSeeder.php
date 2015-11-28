<?php

class PatientencounterformsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('patientencounterforms')->truncate();

		$patientencounterforms = array(
			'chief_complaint' => 'Chief complaint',
			'summary_of_illness'=>'Summary of illness',
			'physical_examination'=>'physical examination',
			'assessment'=>'assessment',
			'appointment_id'=>'1'
		);

		// Uncomment the below to run the seeder
		 DB::table('patientencounterforms')->insert($patientencounterforms);

		$patientencounterforms = array(
			'chief_complaint' => 'Chief complaint 1',
			'summary_of_illness'=>'Summary of illness 1',
			'physical_examination'=>'physical examination 1',
			'assessment'=>'assessment 1',
			'appointment_id'=>'2'
		);
		
		DB::table('patientencounterforms')->insert($patientencounterforms);

	}

}
