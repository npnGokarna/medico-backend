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
		$validation = Validator::make($input, Patientinformation::$rules);

		if ($validation->passes())
		{
			$this->patientinformation->create($input);

			return Redirect::route('patientinformations.index');
		}

		return Redirect::route('patientinformations.create')
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
		$patientinformation = $this->patientinformation->findOrFail($id);

		return View::make('patientinformations.show', compact('patientinformation'));
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
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Patientinformation::$rules);

		if ($validation->passes())
		{
			$patientinformation = $this->patientinformation->find($id);
			$patientinformation->update($input);

			return Redirect::route('patientinformations.show', $id);
		}

		return Redirect::route('patientinformations.edit', $id)
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
		$this->patientinformation->find($id)->delete();

		return Redirect::route('patientinformations.index');
	}

}
