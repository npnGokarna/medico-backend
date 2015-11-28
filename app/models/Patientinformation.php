<?php

class Patientinformation extends Eloquent {

	protected $guarded = array();

	public static $rules = array(
		'patient_id' => 'required',
		'surgical_history' => 'required',
		'obstetic_history' => 'required',
	);
}
