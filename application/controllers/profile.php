<?php

class Profile_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

	}

	public function action_user(){

		$user = Auth::user();


		return View::make('home.profile');

	}

	public function action_addons(){

		$user = Auth::user();

		$addons = $user->addons()->get();

		// Clearing sessions
		if (Session::has('addons')) {
			Session::forget('addons');
		}

		if (Session::has('category')) {
			Session::forget('category');
		}

		if (Session::has('tag')) {
			Session::forget('tag');
		}

		// Creating search result session
		Session::put('userAddons', $addons);

		return View::make('home.userAddons');

	}
}

?>