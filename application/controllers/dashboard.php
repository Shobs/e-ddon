<?php

class Dashboard_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		$user = Auth::user()->first();

		if ($user->temporary = 1) {



			// $newpass = Hash::make('Ruomale1');

			// var_dump($newpass);

			// $user->temporary = 0;

			// $user->save();

			// var_dump($user);
			return View::make('home.dashboard');

		}else{

			return View::make('home.dashboard');
		}
	}
}

?>