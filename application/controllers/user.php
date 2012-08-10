<?php

class User_Controller extends Base_Controller{

	// public $restful = true;

	public function action_authenticate(){

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
					return Redirect::to('home/index');
				}

				// Testing inputs
				// var_dump($input);
				// echo 'newuser ok!';

			}catch(Exception $e){
				Session::flash('status_error', 'An error occurred while creating a new account - please try again.');

				// Testing inputs
				// echo 'newuser flash fail!';
			}
		}else{

			// Adding user data
			$credentials = array(
				'username' => $username,
				'password' => $password
			);

			// Authentication of existing user
			if (Auth::attempt($credentials)) {

				return Redirect::to('dashboard/index');

				// Testing inputs
				// var_dump($credentials);
				// echo 'user ok!';

			}else{
				Session::flash('status_error', 'Your email or password is invalid - please try again.');
				return Redirect::to('home');

				// Testing inputs
				// var_dump($credentials);
				// echo 'user flash fail!';

			}
		}
	}

	public function action_resetPassword(){


		// Aquiring email from form and corresponding user information from DB
		$email = Input::get('email');
		$user = User::where('username', '=', $email)->first();

		// Reformating text for proper display
		$lastname = $user->lastname;
		$lastname = Str::title(Str::lower($lastname));
		$firstname = $user->firstname;
		$firstname = Str::title(Str::lower($firstname));
		$name = $lastname.', '.$firstname;

		// Starts swiftmailer bundle
		// Bundle::start('swiftmailer');

		// // Get the Swift Mailer instance
		// $mailer = IoC::resolve('mailer');

		// // // Construct the message
		// $message = Swift_Message::newInstance('Message From Eddon')
		//     ->setFrom(array('psycko8@yahoo.com'=>"Jean Marcellin"))
		//     ->setTo(array($email=>$name))
		//     ->addPart('My Plain Text Message','text/plain')
		//     ->setBody('My HTML Message','text/html');

		// $mailer->send($message);

		// var_dump ($lastname);

	}

	public function action_upload(){
		// $addonName = Input::get('addonName');
		// $addonAuthor = Input::get('addonAuthor');
		// $addonUpload = Input::get('addonUpload');
		// $addonPicture = Input::get('addonPicture');
		// $addonDesc = Input::get('addonDescription');

		// $addon = new Addon();
		// $addon->name() = $addonName;
		// $addon->description() = $addonDescription;
		// $addon->save();

		// $picture = new Picture();
		// $picture->picture() = $addonPicture;
		// $picture->save();

	}

	public function action_logout(){
		Auth::logout();
		return Redirect::to('home');
	}
}

?>