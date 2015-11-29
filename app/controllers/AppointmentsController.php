<?php

class AppointmentsController extends BaseController {

	/**
	 * Appointment Repository
	 *
	 * @var Appointment
	 */
	protected $appointment;

	protected $patientencounterform;
	protected $user;
	public function __construct(User $user,Appointment $appointment,Patientencounterform $patientencounterform)
	{
		$this->appointment = $appointment;
		$this->user = $user;
		$this->patientencounterform = $patientencounterform;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$appointments = $this->appointment->all();

		return View::make('appointments.index', compact('appointments'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('appointments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		Log::info($input);
		
		$userdata['error'] = false;

		
		$validation = Validator::make($input, Appointment::$rules);

		if ($validation->passes())
		{
			$data['date'] = $input['date'];
			$data['doctor_id'] = $input['doctor_id'];
			$data['patient_id'] = $input['patient_id'];
			$data['patient_encounter_form_id'] = null;
			$data['appointment_status'] = $input['appointment_status'];

			$dta['chief_complaint'] = $input['chief_complaint'];
			$dta['summary_of_illness'] = $input['summary_of_illness'];
			$dta['physical_examination'] = $input['physical_examination'];
			$dta['assessment'] = $input['assessment'];

			$app = $this->appointment->create($data);
			$dta['appointment_id'] = $app->id;
			$pef = $this->patientencounterform->create($dta);
			
			$app->patient_encounter_form_id = $pef->id;
			$app->save();
			$userdata['message'] = "Appointment successfully created.";
			
		}
		else{
			$mess = "";
			$messages = $validation->messages();
			foreach ($messages->all() as $message)
			{
			    $mess .= $message; 
			}
			$userdata['message'] = $mess;
			$userdata['error'] = true;
		}
		return $userdata;	

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$appointment = $this->appointment->find($id);
		if($appointment)
		{
			$pef = $this->patientencounterform->find($appointment->patient_encounter_form_id);
			$usr = $this->user->find($appointment->doctor_id);
			$userdata['date'] = $appointment->date;
			$userdata['appointment_id'] = $appointment->id;
			$userdata['doctor'] = $usr->fullname;
			$userdata['appointment_status'] = $appointment->appointment_status;
			$userdata['chief_complaint'] = $pef->chief_complaint;
			$userdata['summary_of_illness'] = $pef->summary_of_illness;
			$userdata['physical_examination'] = $pef->physical_examination;
			$userdata['assessment'] = $pef->assessment;

			$userdata['error'] = false;
			//$userdata['data'] = $data;
		}
		else{
			$userdata['error'] = true;
			$userdata['message'] = "Appointment not found";
			
		}
		return $userdata;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$appointment = $this->appointment->find($id);

		if (is_null($appointment))
		{
			return Redirect::route('appointments.index');
		}

		return View::make('appointments.edit', compact('appointment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Appointment::$rules);

		if ($validation->passes())
		{
			$appointment = $this->appointment->find($id);
			$appointment->update($input);

			return Redirect::route('appointments.show', $id);
		}

		return Redirect::route('appointments.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$app = $this->appointment->find($id);
		if($app){
			$userid = $app->patient_id;
			$pfid = $app->patient_encounter_form_id;
			$pef = $this->patientencounterform->find($pfid)->first();
			DB::statement('SET FOREIGN_KEY_CHECKS = 0');
			$pef->delete();
			$app->delete();
			DB::statement('SET FOREIGN_KEY_CHECKS = 1');
			return $this->getAppointmentsOfAUser($userid);
			/*
			$userdata['message'] = "Appointment successfully deleted";	
			$userdata['error'] = false;*/
		}
		else{
			$userdata['error'] = true;
			$userdata['message'] = "Appointment not found.";
		}
		return $userdata;
		//return Redirect::route('appointments.index');
	}

	public function placeDoctor($apps){
		$data = [];
		foreach ($apps as $app) {
			$usr = $this->user->find($app->doctor_id);
			$usr1 = $this->user->find($app->patient_id);
			
			//dd($app->doctor_id);
			//dd($usr);
			$app->doctor_id = $usr->fullname;
			$app->patient_id = $usr1->fullname;
			array_push($data,$app);
		}
		return $data;
	}
	public function getAppointmentsOfAUser($userid)
	{
		$apps = $this->appointment->where('patient_id',$userid)->get();
		return $this->getAppointments($apps);	
	}

	public function getAppointmentsOfDoctor($userid)
	{
		$apps = $this->appointment->where('doctor_id',$userid)->get();
		return $this->getAppointments($apps);	
	}

	public function getAppointments($apps)
	{
		if(!$apps->isEmpty()){
			//dd();
			$userdata['data'] = $this->placeDoctor($apps);	
			$userdata['error'] = false;
		}
		else{
			$userdata['error'] = true;
			$userdata['message'] = "No appointment found.";
		}
		return $userdata;
	}


}
