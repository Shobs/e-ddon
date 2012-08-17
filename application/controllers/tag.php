<?php

class Tag_Controller extends Base_Controller {

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


		// Getting tag id from URL
		$tagId = Input::get('tag');

		// Getting corresponding addon ids from DB
		$addonsId = AddonTag::where('tag_id', '=', $tagId)->get('addon_id');

		// For each addon, putting addon information into an array
		foreach ($addonsId as $addonId) {
			$addonId = $addonId->addon_id;
			$addons[] = Addon::where('id', '=', $addonId)->first();
		}

		// Getting the tag information from DB
		$tag = Tag::where('id', '=', $tagId)->first();

		// Creating addons and tag sessions
		Session::put('addons', $addons);
		Session::put('tag', $tag);
		Session::forget('category');


		return View::make('home.tag');

	}


}