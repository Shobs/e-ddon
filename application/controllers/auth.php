<?php

class Auth_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		// Aquiring data from all forms
		$username = Input::get('email');
		$password = Input::get('password');
		$newUser = Input::get('newUser', 'off');


		// Registration of new user
		if ($newUser == 'on') {

			// Aquiring data from registration forms
			$username = Input::get('registrationEmail');
			$lastname = Input::get('lastname');
			$firstname = Input::get('firstname');
			$birthdate = Input::get('birthdate');
			$password2 = Input::get('password2');

			// php form validation
			$input = array(
			'usernameReg' => $username,
			'lastname' => $lastname,
			'firstname' => $firstname,
			'birthdate' => $birthdate,
			'password' => $password
			);

			$rules = array(
				'usernameReg' => 'required|email|unique:users,username',
				'lastname' => 'required|alpha|max:50',
				'firstname' => 'required|alpha|max:50',
				'birthdate' => 'required',
				'password' => 'required',

			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {

				return Redirect::back()->with_errors($validation)->with_input();

			}

			// Adding new user to the DB
			try{
				$user = new User();
				$user->username = $username;
				$user->lastname = $lastname;
				$user->firstname = $firstname;
				$user->birthdate = $birthdate;
				$user->password = Hash::make($password);
				$user->save();

				//automatic login of user after signup
				$credentials = array(
				'username' => $username,
				'password' => $password
				);



				// Authentication of new user
				if (Auth::attempt($credentials)) {

					// Using sha1 encription to generate file location name
			        $addonDirectory = 'public/_uploads/addons/'.sha1(Auth::user()->id);
					$pictureDirectory = 'public/_uploads/pictures/'.sha1(Auth::user()->id);
					$thumbFeatDirectory = 'public/_uploads/thumbsFeat/'.sha1(Auth::user()->id);
					$thumbCatDirectory = 'public/_uploads/thumbsCat/'.sha1(Auth::user()->id);

					// Creating new user upload directory
					mkdir($addonDirectory);
					mkdir($pictureDirectory);
					mkdir($thumbFeatDirectory);
					mkdir($thumbCatDirectory);

					// Making sure user addon session is not there
					Session::forget('userAddons');

					return Redirect::to('profile/user');
				}

			}catch(Exception $e){

				Session::flash('status_error', 'An error occurred while creating a new account - please try again.');

				return Redirect::to('home')->with_input();
			}
		}else{

			$input = array(
			'username' => $username,
			'password' => $password
			);

			$rules = array(
				'username' => 'required|email',
				'password' => 'required',

			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {

				return Redirect::back()->with_errors($validation)->with_input();

			}

			// Adding user data
			$credentials = array(
				'username' => $username,
				'password' => $password
			);

			$remember = Input::get('remember');

			// Authentication of existing user
			if (Auth::attempt($credentials) && (Auth::user()->role == 100)) {

				if(!empty($remember)){
					Auth::login(Auth::user()->id, true);
				}

				return Redirect::to('admin');

			}elseif(Auth::attempt($credentials)){

				if(!empty($remember)){
					Auth::login(Auth::user()->id, true);
				}

				// Making sure user addon session is not there
				Session::forget('userAddons');

				return Redirect::to('profile/user');

			}else{

				Session::flash('loginStatus_error', 'Your email or password is invalid - please try again.');

				return Redirect::to('home')->with_input();

			}
		}
	}

	public function action_logout(){

		Session::flush();

		// Terminating user session
		Auth::logout();

		return Redirect::to('home');
	}

}


?>