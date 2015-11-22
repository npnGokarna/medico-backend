<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('PatientinformationsTableSeeder');
		$this->call('MedicalrecordsTableSeeder');
		$this->call('AppointmentsTableSeeder');
		$this->call('DoctorordersTableSeeder');
		$this->call('PatientencounterformsTableSeeder');
		$this->call('MedicalreportsTableSeeder');
	}

}
