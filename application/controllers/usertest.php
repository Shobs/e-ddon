<?php

class Usertest_Controller extends Base_Controller{

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

	//public $restful = true;

	public function action_authenticate(){

		$username = Input::get('email');
		$lastname = Input::get('lastname');
		$firstname = Input::get('firstname');
		$birthday = Input::get('birthday');
		$country = Input::get('country');
		$password = Input::get('password');
		$newUser = Input::get('newUser', 'off');

		if ($newUser == 'on') {
			try{
				$user = new User();
				$user->username = $username;
				$user->lastname = $lastname;
				$user->firstname = $firstname;
				// $user->birthday = $birthday;
				// $user->country = $country;
				$user->password = $password;
				$user->save();


				return Redirect::to('dashboard/index');
			}catch(Exception $e){
				var_dump($password);
				echo "Failed to create new user!";
			}
		}else{
			$credentials = array(
				'username' => $username,
				'password' => $password
			);
			if (Auth::attempt($credentials)) {
				return Redirect::to('dashboard/index');
			}else{
				var_dump($password);
				echo "Failed to login!";
			}
		}
	}
}

?>