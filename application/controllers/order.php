<?php

class Order_Controller extends Base_Controller {

	// public $restful = true;

	public function action_index(){


	}

	public function action_date(){

		if (Session::has('search')) {
			$searchInput = Session::get('search');
			$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('updated_at', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.search');

		}elseif(Session::has('userAddons')){

			$user = Auth::user();

			$addons = $user->addons()->order_by('updated_at', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('userAddons', $addons);

			return View::make('home.userAddons');

		}elseif(Session::has('category')){

			$category = Session::get('category');
			$addons = Addon::where('category_id', '=', $category->id)->order_by('updated_at', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.category');

		}elseif(Session::has('tag')){

			$tagId = Session::get('tag')->id;
			$addons = Tag::find($tagId)->addons()->order_by('updated_at', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.tag');

		}
	}

	public function action_asc(){

		if (Session::has('search') && Session::get('search') != False) {
			$searchInput = Session::get('search');
			$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('name')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.search');

		}elseif(Session::has('userAddons')){

			$user = Auth::user();

			$addons = $user->addons()->order_by('name')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('userAddons', $addons);

			return View::make('home.userAddons');

		}elseif(Session::has('category')){

			$category = Session::get('category');
			$addons = Addon::where('category_id', '=', $category->id)->order_by('name')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.category');

		}elseif(Session::has('tag')){

			$tagId = Session::get('tag')->id;
			$addons = Tag::find($tagId)->addons()->order_by('name')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.tag');
		}

	}

	public function action_rate(){

		if (Session::has('search')) {
			$searchInput = Session::get('search');
			$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('rating', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.search');

		}elseif(Session::has('userAddons')){

			$user = Auth::user();

			$addons = $user->addons()->order_by('rating', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('userAddons', $addons);

			return View::make('home.userAddons');

		}elseif(Session::has('category')){

			$category = Session::get('category');
			$addons = Addon::where('category_id', '=', $category->id)->order_by('rating', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.category');

		}elseif(Session::has('tag')){

			$tagId = Session::get('tag')->id;
			$addons = Tag::find($tagId)->addons()->order_by('rating', 'desc')->get();

			// Clearing addon session
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			// Creating search result session
			Session::put('addons', $addons);

			return View::make('home.tag');

		}
	}
}