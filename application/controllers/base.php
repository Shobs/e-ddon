<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr.foundation.js');
	    Asset::container('footer')->add('jquery', 'js/libs/jquery.min.js');
	    Asset::container('footer')->add('foundation-js', 'js/libs/foundation.js', 'jquery');
	    Asset::add('foundation-css', 'css/libs/foundation.css');
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

