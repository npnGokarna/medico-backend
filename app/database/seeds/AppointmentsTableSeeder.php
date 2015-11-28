<?php

class AppointmentsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('appointments')->truncate();
		
		$appointments = array(
			'date' => '09-11-2015',
			'appointment_status' => 'active',
			'doctor_id' => 2,
			'patient_id' => 1,
			'patient_encounter_form_id' => 1
		);

		// Uncomment the below to run the seeder
		DB::table('appointments')->insert($appointments);


		$appointments = array(
			'date' => '10-21-2015',
			'appointment_status' => 'active',
			'doctor_id' => 2,
			'patient_id' => 1,
			'patient_encounter_form_id' => 2
		);
		
		DB::table('appointments')->insert($appointments);
		DB::table('patientencounterforms')->where('id', 1)->update(['appointment_id' => 1]);
		DB::table('patientencounterforms')->where('id', 2)->update(['appointment_id' => 2]);
	}

}
