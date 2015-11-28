<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('users')->truncate();

		$users = array(
			'fullname' => 'Achyut Paudel',
			'username' => 'achyut',
			'password' => Hash::make('tuyhca'),
			'email' => 'achyut.pdl@gmail.com',
			'usertype' => 'Patient'
		);

		// Uncomment the below to run the seeder
		 DB::table('users')->insert($users);

		 $users = array(
			'fullname' => 'Pratigya subedi',
			'username' => 'pratigya',
			'password' => Hash::make('tuyhca'),
			'email' => 'prati@mailinator.com',
			'usertype' => 'Doctor'
		);
		DB::table('users')->insert($users);

	}

}
