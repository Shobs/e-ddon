<?php

class User_Controller extends Base_Controller{

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	// public $restful = true;

	public function action_authenticate(){

		$email = Input::get('email');
		$lastname = Input::get('lastname');
		$firstname = Input::get('firstname');
		$birthday = Input::get('birthday');
		$country = Input::get('country');
		$password = Input::get('password');
		$newUser = Input::get('newUser', 'off');

		$input = array(
			'email' => $email,
			'password' => $password
		);

		if ($newUser == 'on') {

			$rules = array(
				'email' => 'required|email|unique:users,email',
				'password' => 'required'
			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {
				return Redirect::to('home')->with_errors($validation);
			}

			try{
				$user = new User();
				$user->email = $email;
				$user->lastname = $lastname;
				$user->firstname = $firstname;
				// $user->birthday = $birthday;
				// $user->country = $country;
				$user->password = Hash::make($password);
				$user->save();
				// Auth::login($user);

				return Redirect::to('home/index');
			}catch(Exception $e){
				Session::flash('status_error', 'An error occurred while creating a new account - please try again.');
			}
		}else{

			$rules = array(
				'email' => 'required|email|unique:users',
				'password' => 'required'
			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {
				return Redirect::to('home')->with_errors($validation);
			}

			$credentials = array(
				'username' => $email,
				'password' => $password
			);
			if (Auth::attempt($credentials)) {
				return Redirect::to('dashboard/index');
			}else{
				Session::flash('status_error', 'Your email or password is invalid - please try again.');
				return Redirect::to('home');
			}
		}
	}
}

?>