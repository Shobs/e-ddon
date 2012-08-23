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
			$lastname = Input::get('lastname');
			$firstname = Input::get('firstname');
			$birthdate = Input::get('birthdate');
			$password2 = Input::get('password2');

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

			}
		}else{

			// Adding user data
			$credentials = array(
				'username' => $username,
				'password' => $password
			);

			// Authentication of existing user
			if (Auth::attempt($credentials) && (Auth::user()->role == 100)) {

				return Redirect::to('admin');

			}elseif(Auth::attempt($credentials)){

				// Making sure user addon session is not there
				Session::forget('userAddons');

				return Redirect::to('profile/user');

			}else{
				Session::flash('status_error', 'Your email or password is invalid - please try again.');

				return Redirect::to('home');

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