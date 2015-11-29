<?php

class MedicalreportsController extends BaseController {

	/**
	 * Medicalreport Repository
	 *
	 * @var Medicalreport
	 */
	protected $medicalreport;
	protected $appointment;
	public function __construct(Medicalreport $medicalreport,Appointment $appointment)
	{
		$this->medicalreport = $medicalreport;
		$this->appointment = $appointment;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medicalreports = $this->medicalreport->all();

		return View::make('medicalreports.index', compact('medicalreports'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('medicalreports.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Medicalreport::$rules);

		if ($validation->passes())
		{
			$report = $this->medicalreport->where('appointment_id',$input['appointment_id'])->get()->first();
			if($report){
				$userdata['message'] = "Medical report successfully updated";
				$report->update($input);
			}
			else{
				$userdata['message'] = "Medical report successfully created";	
				$report = $this->medicalreport->create($input);
			}
			$app = $this->appointment->find($input['appointment_id']);
			$app->medical_report = $report->id;
			$app->save();
			$userdata['error'] = false;
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
		$medicalreport = $this->medicalreport->findOrFail($id);

		return View::make('medicalreports.show', compact('medicalreport'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medicalreport = $this->medicalreport->find($id);

		if (is_null($medicalreport))
		{
			return Redirect::route('medicalreports.index');
		}

		return View::make('medicalreports.edit', compact('medicalreport'));
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
		$validation = Validator::make($input, Medicalreport::$rules);

		if ($validation->passes())
		{
			$medicalreport = $this->medicalreport->find($id);
			$medicalreport->update($input);

			return Redirect::route('medicalreports.show', $id);
		}

		return Redirect::route('medicalreports.edit', $id)
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
		$this->medicalreport->find($id)->delete();

		return Redirect::route('medicalreports.index');
	}

}
