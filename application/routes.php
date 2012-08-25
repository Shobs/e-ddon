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

		$userId = Input::get('id');
		$user = User::find($userId);

		$user->username = Input::get('username');
		$user->lastname = Input::get('lastname');
		$user->firstname = Input::get('firstname');
		$user->role = Input::get('role');
		$user->temporary = Input::get('temporary');
		$user->visible = Input::get('visible');
		$user->comments = Input::get('comments');

		$user->save();

		$user = User::find($userId);

		$user = eloquent_to_json($user);

		echo $user;

	}else{

		// var_dump($searchInput);
	}
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