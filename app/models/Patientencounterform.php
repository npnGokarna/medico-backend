<?php

class Patientencounterform extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'appointment_id' => 'required',
		'chief_complaint' => 'required',
		'summary_of_examination' => 'required',
		'assessment_plan' => 'required'
	);
}
