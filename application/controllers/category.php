<?php

class Category_Controller extends Base_Controller {

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
			$addons = Addon::where('category_id', '=', $category)->order_by('updated_at', 'desc')->get();
		}
		// Getting category info from DB
		$category = Category::where('id', '=', $category)->first();

		// Creating addons and category session
		Session::put('addons', $addons);
		Session::put('category', $category);
		Session::forget('tag');
		Session::forget('search');

		return View::make('home.category');

	}
}