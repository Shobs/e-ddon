<?php

class Category_Controller extends Base_Controller {

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

	public function action_index()
	{

		// Getting category id from URL
		$category = Input::get('cat');

		// Getting addons info from DB that belong to the category
		if($category == 7){
			$addons = Addon::order_by('updated_at', 'desc')->where('visible', '=', 1)->take(8)->get();
		}elseif($category == 8){
			$addons = Addon::order_by('rating', 'desc')->where('visible', '=', 1)->take(8)->get();
		}else{
			$addons = Addon::where('category_id', '=', $category)->get();
		}
		// Getting category info from DB
		$category = Category::where('id', '=', $category)->first();

		// Saving addons and category to session
		Session::put('addons', $addons);
		Session::put('category', $category);


		return View::make('home.category');

	}


}