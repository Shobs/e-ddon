<?php

class Base_Controller extends Controller {

	public function __construct()
	{
	    //Assets
	    Asset::add('modernizr', 'js/libs/modernizr.foundation.js');
	    Asset::container('footer')->add('jquery', 'js/libs/jquery.min.js');
	    Asset::container('footer')->add('reveal-js', 'js/libs/jquery.reveal.js', 'jquery');
	    Asset::container('footer')->add('orbit-js', 'js/jquery.orbit-1.4.0.js', 'jquery');
	    Asset::container('footer')->add('customforms-js', 'js/jquery.customforms.js', 'jquery');
	    Asset::container('footer')->add('placeholder-js', 'js/jquery.placeholder.min.js', 'jquery');
	    Asset::container('footer')->add('tooltips-js', 'js/jquery.tooltips.js', 'jquery');
	    Asset::container('footer')->add('app-js', 'js/app.js', 'jquery');
	    Asset::container('footer')->add('script', 'js/script.js', 'jquery');
	    Asset::add('foundation-css', 'css/libs/foundation.css');
	    Asset::add('foundation-app-css', 'css/libs/app.css', 'foundation-css');
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