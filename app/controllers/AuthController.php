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
	//	dd($input);
		 Log::info($input);
		if ($validation->passes())
		{	
			$input['password'] = Hash::make($input['password']);
			
			$result = $this->user->create($input);
			$data = ['patient_id'=>$result->id];
			$data['patient_information_id'] = $this->patientinformation->create($data)->id;
			$this->medicalrecord->create($data);
		//	return Redirect::route('users.index');
			$data['message'] = "User successfully registered. Please login to continue.";
			$data['error'] = false;
			return $data;
		}
		$mess = "";
		$messages = $validation->messages();
		foreach ($messages->all() as $message)
		{
		    $mess .= $message; 
		}
		$output = array('error' => true, 
			'message' => $mess
			);
		return  $output;

		/*
		return Redirect::route('users.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
			*/
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

        Log::info($userdata);

 		if(Input::get('persist') == 'on')
		   $isAuth = Auth::attempt($userdata, true);
		else
		   $isAuth = Auth::attempt($userdata);
        /* Try to authenticate the credentials */
        //dd($userdata);

        if($isAuth) 
        {
            // we are now logged in, go to admin
         	return $this->afterlogin($userdata['username']);   
        }
        else
        {
        	$userdata = array(
			'loggedin' => false,
            'message' => "Invalid credentials"
        	);	

        	return Response::json($userdata);

//            return Redirect::to('login')->with('message', 'Not valid login credentials');;
        }
	}

	public function afterlogin($username)
	{
		$usr = User::where('username',$username)->get()->first();
		$userdata = array(
			'loggedin' => true,
			'id' => $usr->id,
            'username' => $usr->username,
            'usertype' => $usr->usertype
        );
		return $userdata;		
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
		$email = trim(Input::get('email'));
		$usr = User::where('email',$email)->get()->first();
		if($usr){
			$fullname = $usr->fullname;
			
			$randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 1) . substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
			$usr->password = Hash::make($randomString);
			$usr->save();
			
			$val = array(
				'name' => $fullname,
				'username' => $usr->username,
				'password' => $randomString,
				'email' => $email
			);

			Mail::send('emails.forgotpassword',$val, function($message) use ($val){
	        	$message->from('support@medico.com', 'Medico Support');
				$message->to($val['email'],$val['name'])->subject('New Password for Medico.');
	    	});	
			$userdata = array(
			'message' => 'Password successfully reset. Please check your email. '.$email.' for details',
	    	);
		}
		else{
			$userdata = array(
			'message' => 'User with email: '.$email.' not found. Please make sure the email address you had provided is correct',
	    	);
		}
		
		return $userdata;
		
	}

	public function updatepassword($id)
	{
		$password = Input::get('newpassword1');
		$usr = User::where('id',$id)->get()->first();
		if($usr){
			$usr->password = Hash::make($password);
			$usr->save();
		}
		$userdata = array(
			'message' => 'Password successfully updated.'
        );
		return $userdata;	
		
	}
}
