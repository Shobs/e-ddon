<?php

class Tag_Controller extends Base_Controller {

	// public $restful = true;

	public function action_index()
	{


		// Getting tag id from URL
		$tagId = Input::get('tag');

		// Getting tag addons from DB
		$addons = Tag::find($tagId)->addons()->order_by('updated_at', 'desc')->get();

		// Getting the tag information from DB
		$tag = Tag::where('id', '=', $tagId)->first();

		// Creating addons and tag sessions
		Session::put('addons', $addons);
		Session::put('tag', $tag);
		Session::forget('category');
		Session::forget('search');

		return View::make('home.tag');

	}


}