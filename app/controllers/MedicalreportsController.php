<?php

class MedicalreportsController extends BaseController {

	/**
	 * Medicalreport Repository
	 *
	 * @var Medicalreport
	 */
	protected $medicalreport;

	public function __construct(Medicalreport $medicalreport)
	{
		$this->medicalreport = $medicalreport;
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
			$this->medicalreport->create($input);

			return Redirect::route('medicalreports.index');
		}

		return Redirect::route('medicalreports.create')
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
