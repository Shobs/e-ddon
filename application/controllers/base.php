<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr.foundation.js');

	    Asset::container('footer')->add('jquery', 'js/libs/jquery.js');
	    Asset::container('footer')->add('foundation-js', 'js/libs/foundation.js', 'jquery');
        Asset::container('footer')->add('pwdstr', 'js/libs/pwdstr-1.0.js', 'jquery');
        Asset::container('footer')->add('dataTables', 'js/libs/dataTables.js', 'jquery');
	    Asset::container('footer')->add('script', 'js/script.js', 'jquery');
	    Asset::container('footer')->add('plugins', 'js/plugins.js', 'script');
	    Asset::container('footer')->add('widgEditor', 'js/libs/widgEditor.js');

	    Asset::add('foundation-css', 'css/libs/foundation.css');
	    Asset::add('widgEditor-css', 'css/libs/widgEditor.css');
	    Asset::add('dataTables-css', 'css/libs/demo_table.css');
	    // Asset::add('dataTables-css', 'css/libs/jquery.dataTables_themeroller.css');
	    // Asset::add('dataTablesTheme-css', 'css/libs/peperGrinder/jquery-ui-1.8.23.custom.css');
	    Asset::add('style', 'css/style.css');


	    parent::__construct();
	}

	/**
	 * Catch-all method for requests that can't be matched.
	 *
	 * @param  string    $method
	 * @param  array     $parameters
	 * @return Response
	 */
	public function __call($method, $parameters)
	{
		return Response::error('404');
	}

}

