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

Route::group(['before'=>'auth'],function(){

	Route::resource('users', 'UsersController');

	Route::resource('patientinformations', 'PatientinformationsController');

	Route::resource('medicalrecords', 'MedicalrecordsController');

	Route::resource('appointments', 'AppointmentsController');

	Route::resource('doctororders', 'DoctorordersController');

	Route::resource('patientencounterforms', 'PatientencounterformsController');

	Route::resource('medicalreports', 'MedicalreportsController');

	Route::get('patientdashboard',function(){
		return View::make('patientdashboard');
	});
});

// authentication functions


Route::post('register' , 'AuthController@register');

Route::post('login','AuthController@dologin');
Route::get('login',['as'=>'register','uses'=>'AuthController@getlogin']);

Route::get('register',['as'=>'register','uses'=>'AuthController@create']);


Route::get('logout','AuthController@logout');
Route::get('forgotpassword','AuthController@getForgotPassword');
Route::post('resetpassword','AuthController@resetpassword');
