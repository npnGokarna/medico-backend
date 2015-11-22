<?php

class DoctorordersController extends BaseController {

	/**
	 * Doctororder Repository
	 *
	 * @var Doctororder
	 */
	protected $doctororder;

	public function __construct(Doctororder $doctororder)
	{
		$this->doctororder = $doctororder;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$doctororders = $this->doctororder->all();

		return View::make('doctororders.index', compact('doctororders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('doctororders.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Doctororder::$rules);

		if ($validation->passes())
		{
			$this->doctororder->create($input);

			return Redirect::route('doctororders.index');
		}

		return Redirect::route('doctororders.create')
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
		$doctororder = $this->doctororder->findOrFail($id);

		return View::make('doctororders.show', compact('doctororder'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$doctororder = $this->doctororder->find($id);

		if (is_null($doctororder))
		{
			return Redirect::route('doctororders.index');
		}

		return View::make('doctororders.edit', compact('doctororder'));
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
		$validation = Validator::make($input, Doctororder::$rules);

		if ($validation->passes())
		{
			$doctororder = $this->doctororder->find($id);
			$doctororder->update($input);

			return Redirect::route('doctororders.show', $id);
		}

		return Redirect::route('doctororders.edit', $id)
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
		$this->doctororder->find($id)->delete();

		return Redirect::route('doctororders.index');
	}

}
