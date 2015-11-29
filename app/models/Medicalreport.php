<?php

class Medicalreport extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'appointment_id' => 'required'
	);
}
