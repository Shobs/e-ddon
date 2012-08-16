<?php

class Home_Controller extends Base_Controller {

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

		// Getting info from database
		$lastAdded = Addon::order_by('created_at', 'desc')->where('visible', '=', 1)->first();
		$highestRated = Addon::order_by('rating', 'desc')->where('visible', '=', 1)->first();
		$selected = Addon::where('selected', '=', 1)->first();

		// Getting tag id's that have addons from addon_tag table
		$tagIds = AddonTag::group_by('tag_id')->get('tag_id');

		// Looping through each tag
		foreach ($tagIds as $tagId) {

			// Counting how many addons each tag has
			$tagCount = AddonTag::where('tag_id', '=', $tagId->tag_id)->count();

			// Selecting the current tag
			$tag = Tag::where('id', '=', $tagId->tag_id)->first();

			// Checking if frequency in table is not equal to new frequency
			if( $tag->frequency != $tagCount){

				// Setting the frequency value for the tag
				$tag->frequency = $tagCount;

				// updating tag frequency in tags table
				$tag->save();
			}


		}


		// Saving info from database to session
		Session::put('lastAdded', $lastAdded);
		Session::put('highestRated', $highestRated);
		Session::put('selected', $selected);

		return View::make('home.index');
	}


}