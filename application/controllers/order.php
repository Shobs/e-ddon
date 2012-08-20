<?php

class Order_Controller extends Base_Controller {

	// public $restful = true;

	public function action_index(){

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

		// Creating addons and category session
		Session::put('addons', $addons);
		Session::put('category', $category);
		Session::forget('tag');


		return View::make('home.category');

	}

	public function action_date(){

		$searchInput = Session::get('search');

		var_dump($searchInput);
		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('updated_at', 'desc')->get();

		var_dump($searchInput);

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

		var_dump($searchInput);

		$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('name')->get();

		var_dump($searchInput);

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