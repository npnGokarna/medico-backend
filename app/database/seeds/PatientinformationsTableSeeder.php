<?php

class PatientinformationsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('patientinformations')->truncate();

		$patientinformations = array(
			'patient_id'=>1,
			'surgical_history'=>'surgical history',
			'obstetic_history'=>'obstetic history',
			'immunization_history'=>'immunization history',
			'medical_allergy'=>'medical allergy',
			'family_history'=>'family history',
			'social_history'=>'social history',
			'habits'=>'habits'
		);

		// Uncomment the below to run the seeder
		 DB::table('patientinformations')->insert($patientinformations);
	}

}
