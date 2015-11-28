<?php

class Patientencounterform extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'chief_complaint' => 'required',
	);
}
