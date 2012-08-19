<?php

class Search_Controller extends Base_Controller {

	// public $restful = true;

	public function action_index(){

		// Getting category id from URL
		$searchInput = Input::get('s');

		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('updated_at', 'desc')->get();

	    // Creating search result session
		Session::put('addons', $addons);
		Session::put('search', $searchInput);

		return View::make('home.search');

	}
}
?>