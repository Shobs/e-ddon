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

		// Getting all inputs from upload form
		$input = Input::all();

		// Sanitizing the description text
        if( isset($input['addonDescription']) ) {
            $input['addonDescription'] = filter_var($input['addonDescription'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }

        // Setting up my rules for validation
        $rules = array(
        	'addonName' => 'required|max:50',
        	'addonVersion' => 'required',
			'addonAuthor' => 'required|max:50',
			'addonDescription' => 'required',
			'addonUpload' => 'required|mimes:zip|max:3145728',
			'pictureUpload' => 'required|image|max:500000',
        );

        // Validating the form info
        $validation = Validator::make($input, $rules);

        // If validation fails returns to the previous page with errors
        if( $validation->fails() ) {
            return Redirect::back()->with_errors($validation);
        }

        // Getting addon and picture extension (zip, jpg, ...)
        $addonExtension = File::extension($input['addonUpload']['name']);
        $pictureExtension = File::extension($input['pictureUpload']['name']);

        // Using sha1 encription to generate file location name
        $addonDirectory = 'public/_uploads/addons/'.sha1(Auth::user()->id);
		$pictureDirectory = 'public/_uploads/pictures/'.sha1(Auth::user()->id);

		// Using sha1 encription to generate random file name and adding extension
        $addonFilename = sha1(Auth::user()->id.time()).".{$addonExtension}";
        $pictureFilename = sha1(Auth::user()->id.time()).".{$pictureExtension}";

        // testing
        // var_dump($category);

        // Uploading addon and it's picture
        $add_upload_success = Input::upload('addonUpload', $addonDirectory, $addonFilename);
        $pic_upload_success = Input::upload('pictureUpload', $pictureDirectory, $pictureFilename);

        // testing if addon and pictures were succesfully uploaded
        if( $add_upload_success && $pic_upload_success) {

        	// Setting up array with addon information
        	$addon = new Addon(array(
            	'name' => $input['addonName'],
            	'version' => $input['addonVersion'],
            	'author' => $input['addonAuthor'],
            	'description' => $input['addonDescription'],
            	'category_id' => $input['category'],
                'location' => '../public/_uploads/addons/'.sha1(Auth::user()->id).'/'.$addonFilename,
             ));

        	// Adding addon info to the database
        	Auth::user()->addons()->save($addon);

        	// setting up array with picture info
        	$picture = new Picture(array(
            	'addon_id' => $addon->id,
                'location' => '../public/_uploads/pictures/'.sha1(Auth::user()->id).'/'.$pictureFilename,
             ));

        	// Adding picture info to database
            $addon->pictures()->save($picture);

            Session::flash('status_success', 'Successfully uploaded your new addon');
        } else {
            Session::flash('status_error', 'An error occurred while uploading your new addon - please try again.');
        }
        return Redirect::to('dashboard');

	}

	public function action_logout(){

		// Terminating user session
		Auth::logout();

		return Redirect::to('home');
	}
}


?>