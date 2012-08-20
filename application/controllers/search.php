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

	public function action_date(){

		$searchInput = Session::get('search');

		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('updated_at', 'desc')->get();

		// Clearing addon session
		if (Session::has('addons')) {
			Session::forget('addons');
		}

		// Creating search result session
		Session::put('addons', $addons);

		return View::make('home.search');

	}

	public function action_asc(){

		$searchInput = Session::get('search');

		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('name')->get();

		// Clearing addon session
		if (Session::has('addons')) {
			Session::forget('addons');
		}

		// Creating search result session
		Session::put('addons', $addons);

		return View::make('home.search');

	}

	public function action_rate(){

		$searchInput = Session::get('search');

		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('rating', 'desc')->get();

		// Clearing addon session
		if (Session::has('addons')) {
			Session::forget('addons');
		}

		// Creating search result session
		Session::put('addons', $addons);

		return View::make('home.search');

	}
}
?>