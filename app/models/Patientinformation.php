<?php

class Patientinformation extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'patient_id' => 'required',
		'surgical_history' => 'required',
		'obstetic_history' => 'required',
		'medical_allergy' => 'required',
		'family_history' => 'required',
		'social_history' => 'required',
		'habits' => 'required',
		'immunization_history' => 'required',
		'development_history' => 'required'
	);
}
