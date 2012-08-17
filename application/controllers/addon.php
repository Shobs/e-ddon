<?php

class Addon_Controller extends Base_Controller{

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

		// Getting addon tags from DB

		$tags = Addon::find($id)->tags()->take(5)->get();

		// Saving the addon and category to session
		Session::put('addon', $addon);
		Session::put('category', $category);
		Session::put('tags', $tags);

		// Testing
		// var_dump($tags);

		// Redirect to addon page
		return View::make('home.addon');
	}
}

?>