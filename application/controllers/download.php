<?php

class Download_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		$id = Input::get('id');
		// Getting addon info
		//
		$addon = Addon::where('id', '=', $id)->first();

		// Getting addon info from DB
		$location = $addon->location;

		// Getting the addon name
		$name = $addon->name;

		// Getting addon version
		$version = $addon->version;

		// Updating addon's downloaded column
		$download = $addon->downloaded + 1;
		$addon->downloaded = $download;
		$addon->save();

		// Send addon for download with rename
		return Response::download($location, $name.'-'.$version.'.zip');
	}
}

?>