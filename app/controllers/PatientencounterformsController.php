<?php

class PatientencounterformsController extends BaseController {

	/**
	 * Patientencounterform Repository
	 *
	 * @var Patientencounterform
	 */
	protected $patientencounterform;

	public function __construct(Patientencounterform $patientencounterform)
	{
		$this->patientencounterform = $patientencounterform;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$patientencounterforms = $this->patientencounterform->all();

		return View::make('patientencounterforms.index', compact('patientencounterforms'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patientencounterforms.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Patientencounterform::$rules);

		if ($validation->passes())
		{
			$this->patientencounterform->create($input);

			return Redirect::route('patientencounterforms.index');
		}

		return Redirect::route('patientencounterforms.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patientencounterform = $this->patientencounterform->findOrFail($id);
		return $patientencounterform;
		//return View::make('patientencounterforms.show', compact('patientencounterform'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patientencounterform = $this->patientencounterform->find($id);

		if (is_null($patientencounterform))
		{
			return Redirect::route('patientencounterforms.index');
		}

		return View::make('patientencounterforms.edit', compact('patientencounterform'));
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
		$validation = Validator::make($input, Patientencounterform::$rules);

		if ($validation->passes())
		{
			$patientencounterform = $this->patientencounterform->find($id);
			$patientencounterform->update($input);

			return Redirect::route('patientencounterforms.show', $id);
		}

		return Redirect::route('patientencounterforms.edit', $id)
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
		$this->patientencounterform->find($id)->delete();

		return Redirect::route('patientencounterforms.index');
	}

}
