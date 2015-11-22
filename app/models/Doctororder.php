<?php

class Doctororder extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'appointment_id' => 'required',
		'symptoms' => 'required',
		'diagnosis' => 'required',
		'medicine_prescribed' => 'required'
	);
}
