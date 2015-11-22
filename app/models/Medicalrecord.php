<?php

class Medicalrecord extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'patient_id' => 'required',
		'patient_information_id' => 'required'
	);
}
