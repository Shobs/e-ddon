<?php

class Reset_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){


		// Aquiring email from form and corresponding user information from DB
		$email = Input::get('email');
		$user = User::where('username', '=', $email)->first();

		// Reformating text for proper display
		$lastname = $user->lastname;
		$lastname = Str::title(Str::lower($lastname));
		$firstname = $user->firstname;
		$firstname = Str::title(Str::lower($firstname));
		$name = $lastname.', '.$firstname;


		// Temp password generation
		// Characters that can be used for password
		$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

		// Defining the max lenght
		$maxLenght = strlen($possible);

		// Creating a empty string variable
		$tempPassword = '';

		// Looping through characters with a maximum of 9 loops
		for ($i=0; $i < 8; $i++) {

			// Picking a random character
			$randomPick = mt_rand(1, $maxLenght);

			// Taking 1 character out to account for array starting at 0
			$randomChar = $possible[$randomPick - 1];

			// Concanating characters to a variable
			$tempPassword .= $randomChar;
		}

		// Mailing user temp password
		// Get the Swift Mailer instance
		$mailer = IoC::resolve('mailer');

		// Construct the message
		$message = Swift_Message::newInstance('Message From Eddon.com')
		    ->setFrom(array('admin@eddon.com'=>"Admin"))
		    ->setTo(array($email => $name))
		    ->addPart('Password Reset Request for Eddon.com','text/plain')
		    ->setBody( $firstname.',<br><br>Eddon has received your request to reset your password for the Eddon website.  Your temporary password is: <br>'.$tempPassword.'<br><br>If you did not request this change, or if you need further assistance, feel free to contact us:<br>eddon@eddon.com<br><br>Eddon hopes to see you soon!<br><br>- Eddon\'s Support Team','text/html');

		// Send the message
		$mail_sent_success = $mailer->send($message);

		// checking if email was sent
		if ($mail_sent_success) {
			$user->password = Hash::make($tempPassword);
			$user->temporary = 1;

			$user->save();

		    Session::flash('status_success', 'Successfully sent you a temporary password');
        } else {
            Session::flash('status_error', 'An error occurred while sending you a new password - please try again.');
		}



		// var_dump ($name);

	}


}


?>