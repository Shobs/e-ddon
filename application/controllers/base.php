<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr.foundation.js');

	    Asset::container('footer')->add('jquery', 'js/libs/jquery.min.js');
	    Asset::container('footer')->add('foundation-js', 'js/libs/foundation.js', 'jquery');
        Asset::container('footer')->add('widgEditor', 'js/libs/widgEditor.js');
        Asset::container('footer')->add('pwdstr', 'js/libs/jquery.pwdstr-1.0.source.js');
	    Asset::container('footer')->add('plugins', 'js/plugins.js', 'script');
	    Asset::container('footer')->add('script', 'js/script.js', 'jquery');

	    Asset::add('foundation-css', 'css/libs/foundation.css');
	    Asset::add('widgEditor-css', 'css/libs/widgEditor.css');
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

