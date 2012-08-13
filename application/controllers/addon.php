<?php

class Addon_Controller extends Base_Controller{

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

	public function action_index(){

		// Getting addon id from URL
		$id = Input::get('id');

		// Getting addon info from DB
		$addon = Addon::where('id', '=', $id)->first();

		// Getting category id from addon
		$categoryId = $addon->category_id;

		// Getting category info from DB
		$category = Category::where('id', '=', $categoryId)->first();

		// Saving the addon and category to session
		Session::put('addon', $addon);
		Session::put('category', $category);

		// Testing
		// var_dump($category);

		// Redirect to addon page
		return View::make('home.addon');
	}
}

?>