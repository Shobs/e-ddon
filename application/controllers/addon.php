<?php

class Addon_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		// Getting addon id from URL
		$id = Input::get('id');

		// Getting addon info from DB
		$addon = Addon::where('id', '=', $id)->first();

		// Getting category from DB
		$category = $addon->categories()->first();

		// Getting addon tags from DB
		$tags = Addon::find($id)->tags()->take(5)->get();

		// Saving the addon and category to session
		Session::put('addon', $addon);
		Session::put('category', $category);
		Session::put('tags', $tags);

		// Making sure user addon session is not there
		Session::forget('userAddons');


		// Redirect to addon page
		return View::make('home.addon');
	}
}

?>