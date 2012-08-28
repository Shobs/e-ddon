<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr.foundation.js');

	    Asset::add('foundation-css', 'css/libs/foundation.css');
	    Asset::add('widgEditor-css', 'css/libs/widgEditor.css');
	    Asset::add('tableSorter-css', 'css/libs/tableSorter.css');
	    Asset::add('elfinder-css', 'css/libs/elfinder.min.css');
	    Asset::add('style', 'css/style.css');

	    Asset::container('footer')->add('jquery', 'js/libs/jquery.js');
	    Asset::container('footer')->add('foundation-js', 'js/libs/foundation.js', 'jquery');
        Asset::container('footer')->add('pwdstr', 'js/libs/pwdstr-1.0.js', 'jquery');
        Asset::container('footer')->add('tableSorter', 'js/libs/tableSorter.js', 'jquery');
	    Asset::container('footer')->add('elfinder', 'js/libs/elfinder.min.js', 'jquery');
	    Asset::container('footer')->add('dataTable', 'js/dataTable.js', 'jquery');
	    Asset::container('footer')->add('script', 'js/script.js', 'jquery');
	    Asset::container('footer')->add('plugins', 'js/plugins.js', 'script');
	    Asset::container('footer')->add('widgEditor', 'js/libs/widgEditor.js');

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

