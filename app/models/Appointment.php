<?php

class Appointment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'date' => 'required',
		'appointment_status' => 'required',
		'doctor_id' => 'required',
		'patient_id' => 'required',
		'doctor_encounter_form' => 'required',
		'doctor_order_form' => 'required',
		'medical_report' => 'required'
	);
}
