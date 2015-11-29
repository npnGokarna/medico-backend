<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','AuthController@checkAndRedirect');

	Route::resource('users', 'UsersController');
	Route::get('getalldoctors','UsersController@getAllDoctors');
//Route::group(['before'=>'auth'],function(){

	Route::resource('patientinformations', 'PatientinformationsController');
	Route::get('checkforpatientinfo/{id}','PatientinformationsController@checkforpatientinfo');

	Route::resource('medicalrecords', 'MedicalrecordsController');

	Route::resource('appointments', 'AppointmentsController');
	
	Route::get('getuserappointment/{id}', 'AppointmentsController@getAppointmentsOfAUser');
	Route::get('getdoctorappointment/{id}', 'AppointmentsController@getAppointmentsOfDoctor');
	
	Route::resource('doctororders', 'DoctorordersController');

	Route::resource('patientencounterforms', 'PatientencounterformsController');

	Route::resource('medicalreports', 'MedicalreportsController');

	Route::get('patientdashboard',function(){
		return View::make('patientdashboard');
	});


//});

// authentication functions


Route::post('register' , 'AuthController@register');

Route::post('login','AuthController@dologin');
Route::get('login',['as'=>'register','uses'=>'AuthController@getlogin']);

Route::get('register',['as'=>'register','uses'=>'AuthController@create']);


Route::get('logout','AuthController@logout');
Route::get('forgotpassword','AuthController@getForgotPassword');

Route::post('resetpassword','AuthController@resetpassword');

Route::post('updatepassword/{id}','AuthController@updatepassword');

Route::get('devicedata',function(){
	$data['bloodpressure']= rand(100,120)."/".rand(130,180);
	$data['heartbeat'] = rand(120,180);
	$data['bodytemperature']= rand(95,103);
	$data['bloodsugerlevel']= rand(70,90);
	$data['airflow']=rand(50,90);
	return $data;
});
