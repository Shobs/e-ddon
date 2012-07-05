<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr-2.5.3.min.js');
	    Asset::container('footer')->add('jquery', 'js/libs/jquery-1.7.1.min.js');
	    Asset::container('footer')->add('bootstrap-js', 'js/libs/bootstrap.min.js', 'jquery');
	    Asset::container('footer')->add('plugins', 'js/plugins.js', 'jquery');
	    Asset::container('footer')->add('script', 'js/script.js', 'jquery');
	    Asset::add('bootstrap-css', 'css/libs/bootstrap.min.css');
	    Asset::add('bootstrap-css-responsive', 'css/libs/bootstrap-responsive.min.css', 'bootstrap-css');
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