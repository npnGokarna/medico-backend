<?php

class PatientinformationsController extends BaseController {

	/**
	 * Patientinformation Repository
	 *
	 * @var Patientinformation
	 */
	protected $patientinformation;

	public function __construct(Patientinformation $patientinformation)
	{
		$this->patientinformation = $patientinformation;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$patientinformations = $this->patientinformation->all();

		return View::make('patientinformations.index', compact('patientinformations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patientinformations.create');
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
		$validation = Validator::make($input, Patientinformation::$rules);
		$userdata = array(
			'message' => 'Password successfully updated.'
        );
		if ($validation->passes())
		{
			$this->patientinformation->create($input);
			$userdata['message'] = "Patient information saved.";

			//return Redirect::route('patientinformations.index');
		}
		else{
			$userdata['message'] = "Error while creating patient information. Please make sure all the input fields are filled up.";
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
		$patientinformation = $this->patientinformation->where('patient_id',$id)->get()->first();
		if($patientinformation){
			$patientinformation['error'] = false;
		}
		else{
			$patientinformation['error'] = true;
		}
		return $patientinformation;

		//return View::make('patientinformations.show', compact('patientinformation'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patientinformation = $this->patientinformation->find($id);

		if (is_null($patientinformation))
		{
			return Redirect::route('patientinformations.index');
		}

		return View::make('patientinformations.edit', compact('patientinformation'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Patientinformation::$rules);

		if ($validation->passes())
		{
			$patientinformation = $this->patientinformation->where('patient_id',$input['patient_id'])->get()->first();
			if(!$patientinformation){
				$patientinformation->create($input);
				$userdata['message'] = "Patient information created.";
			}
			else{
				$patientinformation->update($input);
				$userdata['message'] = "Patient information updated.";
				
			}
			$userdata['error'] = false;
			//return Redirect::route('patientinformations.index');
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->patientinformation->find($id)->delete();

		return Redirect::route('patientinformations.index');
	}

	public function checkforpatientinfo($id)
	{
		$patientinformation = $this->patientinformation->where('patient_id',$id)->get()->first();
		$userdata = [];
		if (empty($patientinformation['surgical_history']))
		{
			$userdata['isempty'] = true;
		}
		else{
			$userdata['isempty'] = false;
		}
		return $userdata;
	}
}
