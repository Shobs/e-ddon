<?php

class Admin_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		if (Auth::user()-> role == 100) {

			return View::make('admin.dashboard');

		}else{

			return View::make('home');
		}
	}

	public function action_addons(){

		if (Auth::user()-> role == 100) {

			$addons = Addon::get();

			Session::put('addons', $addons);

			return View::make('admin.addons');

		}else{

			return View::make('home');
		}
	}

	public function action_files(){

		if (Auth::user()-> role == 100) {



			return View::make('admin.files');

		}else{

			return View::make('home');
		}
	}

	public function action_profile(){

		if (Auth::user()-> role == 100) {



			return View::make('admin.profile');

		}else{

			return View::make('home');
		}
	}

	public function action_users(){

		if (Auth::user()-> role == 100) {

			$usersData = User::get();

			// $jsonUsers = eloquent_to_json($users);

			// var_dump($users);
			// echo $jsonUsers;

			Session::put('usersData', $usersData);

			return View::make('admin.users');

		}else{

			return View::make('home');
		}
	}
}

?>