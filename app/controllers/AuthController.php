<?php

class AuthController extends BaseController {

	/**
	 * User Repository
	 *
	 * @var User
	 */
	protected $user;
	protected $medicalrecord;
	protected $patientinformation;

	public function __construct(User $user,Medicalrecord $medicalrecord,Patientinformation $patientinformation)
	{
		$this->medicalrecord = $medicalrecord;
		$this->patientinformation = $patientinformation;
		$this->user = $user;
	}


	/*
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function register()
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$rules);

		if ($validation->passes())
		{	
			$input['password'] = Hash::make($input['password']);
			
			$result = $this->user->create($input);
			$data = ['patient_id'=>$result->id];
			$data['patient_information_id'] = $this->patientinformation->create($data)->id;
			$this->medicalrecord->create($data);
			return Redirect::route('users.index');
		}

		return Redirect::route('users.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	public function getlogin()
	{
		return View::make('loginform');
	}
	public function dologin(){
		/* Get the login form data using the 'Input' class */
        $userdata = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
 		if(Input::get('persist') == 'on')
		   $isAuth = Auth::attempt($userdata, true);
		else
		   $isAuth = Auth::attempt($userdata);
        /* Try to authenticate the credentials */
        //dd($userdata);

        if($isAuth) 
        {
            // we are now logged in, go to admin
         	return $this->afterlogin();   
        }
        else
        {
            return Redirect::to('login')->with('message', 'Not valid login credentials');;
        }
	}

	public function afterlogin()
	{
		return Redirect::to('patientdashboard');
		
	}

	public function logout()
	{
		
	    Auth::logout();
	    return Redirect::to('login');
	}

	public function checkAndRedirect(){
		if (Auth::guest()){
			return Redirect::guest('login');	
		} 
		else{
			return $this->afterlogin();
		}
	}

	public function getForgotPassword()
	{
		return View::make('auth.forgotpassword');
	}

	public function resetpassword()
	{
		$email = Input::get('email');
		return Redirect::to('forgotpassword')->with('message','Please check your email. Password sent.');
	}
}
