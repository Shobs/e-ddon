<?php

class Home_Controller extends Base_Controller {

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

		// Making sure user addon session is not there
		Session::forget('userAddons');

		return View::make('home.index');
	}


}