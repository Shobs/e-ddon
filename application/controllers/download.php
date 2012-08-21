<?php

class Download_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		// Getting addon info
		$addon = Session::get('addon');

		// Getting addon info from DB
		$location = $addon->location;

		$name = (string)$addon->name;
		$version = $addon->version;

		// Send addon for download
		return Response::download('public/'.$location, $name.'-'.$version.'.zip');
	}
}

?>