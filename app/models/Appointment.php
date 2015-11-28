<?php

class Appointment extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'date' => 'required',
		'appointment_status' => 'required',
		'doctor_id' => 'required',
		'patient_id' => 'required',
	);

	public function Patientencounterform()
	{
		return $this->belongsTo('Patientencounterform','id','patient_encounter_form_id');
	}

	public function Patient()
	{
		return $this->hasOne('User', 'id', 'patient_id');
	}

	public function Doctor()
	{
		return $this->hasOne('User', 'id', 'doctor_id');
	}


}
