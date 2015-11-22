<?php

class MedicalrecordsController extends BaseController {

	/**
	 * Medicalrecord Repository
	 *
	 * @var Medicalrecord
	 */
	protected $medicalrecord;

	public function __construct(Medicalrecord $medicalrecord)
	{
		$this->medicalrecord = $medicalrecord;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$medicalrecords = $this->medicalrecord->all();

		return View::make('medicalrecords.index', compact('medicalrecords'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('medicalrecords.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Medicalrecord::$rules);

		if ($validation->passes())
		{
			$this->medicalrecord->create($input);

			return Redirect::route('medicalrecords.index');
		}

		return Redirect::route('medicalrecords.create')
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
		$medicalrecord = $this->medicalrecord->findOrFail($id);

		return View::make('medicalrecords.show', compact('medicalrecord'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medicalrecord = $this->medicalrecord->find($id);

		if (is_null($medicalrecord))
		{
			return Redirect::route('medicalrecords.index');
		}

		return View::make('medicalrecords.edit', compact('medicalrecord'));
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
		$validation = Validator::make($input, Medicalrecord::$rules);

		if ($validation->passes())
		{
			$medicalrecord = $this->medicalrecord->find($id);
			$medicalrecord->update($input);

			return Redirect::route('medicalrecords.show', $id);
		}

		return Redirect::route('medicalrecords.edit', $id)
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
		$this->medicalrecord->find($id)->delete();

		return Redirect::route('medicalrecords.index');
	}

}
