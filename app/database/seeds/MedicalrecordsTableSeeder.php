<?php

class MedicalrecordsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('medicalrecords')->truncate();

		$medicalrecords = array(
			'patient_id' => 1,
			'patient_information_id' => 1
		);

		// Uncomment the below to run the seeder
		DB::table('medicalrecords')->insert($medicalrecords);
		$medicalrecords = array(
			'patient_id' => 2,
			'patient_information_id' => 2
		);
		DB::table('medicalrecords')->insert($medicalrecords);

	}

}
