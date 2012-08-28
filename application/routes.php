<?php




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

// Live search route
Route::post('liveSearch', function() {

	// Checking if it's an ajax request
	if (Request::ajax()) {

		// Getting ajax request
    	$searchInput = Input::get('searchInput');

    	// Making sure input is not empty
		if ($searchInput != '') {

	    	// Getting info from DB
	    	$addons = Addon::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('name')->take(4)->get();
	    	$tags = Tag::where('name', 'LIKE', '%'.$searchInput.'%')->order_by('name')->take(4)->get();

	    	echo '<div class="six columns">';
			echo '<ul id="searchResults">';
			echo '<li>Addons ►</li>';

			// Sending back array info
			foreach ($addons as $addon) {
				echo '<li class="helperResult">'.HTML::link('addon?id='.$addon->id, $addon->name).'</li>';
			}
			echo '</ul>';
			echo '</div>';

			echo '<div class="six columns">';
			echo '<ul id="searchResults">';
			echo '<li>Tags ►</li>';

			// Sending back array info
			foreach ($tags as $tag) {
				echo '<li class="helperResult">'.HTML::link('tag?tag='.$tag->id, $tag->name).'</li>';
			}
			echo '</ul>';
			echo '</div>';
		}else{

			// var_dump($searchInput);
		}
	}
});

Route::post('userstable', function() {

	// Checking if it's an ajax request
	if (Request::ajax()) {

		// Getting user id
		$userId = Input::get('id');

		// Getting user from DB
		$user = User::find($userId);

		// checking if any changes have occured between input and db
		if ($user->username != Input::get('username')) {
			$user->username = Input::get('username');
		}
		if ($user->lastname != Input::get('lastname')) {
			$user->lastname = Input::get('lastname');
		}
		if ($user->firstname != Input::get('firstname')) {
			$user->firstname = Input::get('firstname');
		}
		if ($user->role != Input::get('role')) {
			$user->role = Input::get('role');
		}
		if ($user->temporary != Input::get('temporary')) {
			$user->temporary = Input::get('temporary');
		}
		if ($user->visible != Input::get('visible')) {
			$user->visible = Input::get('visible');
		}
		if ($user->comments != Input::get('comments')) {
			$user->comments = Input::get('comments');
		}

		// saving user
		$user->save();

		// Getting user from DB
		$user = User::find($userId);

		// Formating user from object to JSON
		$user = eloquent_to_json($user);

		// Sending JSON
		echo $user;

	}else{

		// var_dump($searchInput);
	}
});

Route::post('admin/elfinder', function() {

error_reporting(0); // Set E_ALL for debuging

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}

$opts = array(
	// 'debug' => true,
	'roots' => array(
		array(
			'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
			'path'          => '../files/',         // path to files (REQUIRED)
			'URL'           => dirname($_SERVER['PHP_SELF']) . '/../files/', // URL to files (REQUIRED)
			'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

});

Route::controller(Controller::detect());
Route::get('about', 'home@about');



/*
Route::get('/', function()
{
	return View::make('home.index');
});
 */
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('home');
});

Route::filter('nonauth', function()
{
	if(Auth::guest() == false) return Redirect::to('dashboard');
});