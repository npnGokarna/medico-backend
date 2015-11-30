<?php
use Illuminate\Database\Eloquent\Collection;

class UsersController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $user;
	
	protected $medicalRecord;

	public function __construct(Medicalrecord $medicalRecord,User $user)
	{
		$this->medicalRecord = $medicalRecord;
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->user->all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		error_log("calle");
		$user = $this->user->findOrFail($id);
		return $user;
		//return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->user->find($id);

		if (is_null($user))
		{
			return Redirect::route('users.index');
		}

		return View::make('users.edit', compact('user'));
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
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{
			$user = $this->user->find($id);
			$input['password'] = Hash::make($input['password']);
			$user->update($input);

			return Redirect::route('users.show', $id);
		}

		return Redirect::route('users.edit', $id)
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
		$this->user->find($id)->delete();

		return Redirect::route('users.index');
	}

	public function getAllDoctors()
	{
		$doctors = [];
		$users = User::where('usertype','Doctor')->get();
		foreach ($users as $key) {
			$dta['id'] = $key->id;
			$dta['name'] = $key->username;
			array_push($doctors,$dta);
		}
		$data['result'] = $doctors;
		return $data;
	}

	public function searchPatient(){
		$input = Input::all();
		$patient_name = trim($input['patient_name']);
		$patient_ssn = trim($input['patient_ssn']);
		$medical_record_id = trim($input['medical_record_id']);
		$patient_phone = trim($input['patient_phone']);
		$users = Collection::make([]);
		if(!empty($patient_ssn)){
			$users = $this->user->where('ssn',$patient_ssn)->get();
		}
		if(!empty($medical_record_id) && $users->isEmpty()){
			$medicalrecords = $this->medicalRecord->where('id',$medical_record_id)->get()->first();
			$users = $this->user->where('id',$medicalrecords->patient_id)->get();	
		}
		if(!empty($patient_name) && $users->isEmpty()){
			$users = $this->user->where('fullname', 'LIKE', '%'.$patient_name.'%')->get();
		}
		if(!empty($patient_phone) && $users->isEmpty()){
			$users = $this->user->where('phone', 'LIKE', '%'.$patient_phone.'%')->get();	
		}
		if($users!=null && !$users->isEmpty()){
			$userdata['error'] = false;
			$userdata['data'] = $users;
		}
		else{
			$userdata['error'] = true;
			$userdata['message'] = "Users with given search criteria not found";	
		}
		return $userdata;
	}
}
