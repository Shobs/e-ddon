<?php

class Profile_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

	}

	public function action_user(){

		if(Auth::check()){

			$input = Input::all();

			$user = Auth::user();


			if(!empty($input)){

				//php form validation
				$valInput = array(
					'username' => $input['email'],
					'lasname' => $input['lastname'],
					'firstname' => $input['firstname'],
					'birthdate' => $input['birthdate'],
					'password' => $input['pass1'],
					'password2' => $input['pass2']
					);

				$rules = array(
					'username' => 'email|unique:users,username',
					'lastname' => 'alpha|max:50',
					'firstname' => 'alpha|max:50',
					'password' => 'same:password2',
					'password2' => 'same:password'
					);

				$messages = array(
					'same' => 'Your passwords must match!',
					);

				$validation = Validator::make($valInput, $rules, $messages);

				if ($validation->fails()) {
					return Redirect::back()->with_errors($validation);
				}


				if(($input['email'] != $user->username)&&($input['email'] != '')){
					$user->username = $input['email'];
				}

				if(($input['firstname'] != $user->firstname)&&($input['firstname'] != '')){
					$user->firstname = $input['firstname'];
				}

				if(($input['lastname'] != $user->lastname)&&($input['lastname'] != '')){
					$user->lastname = $input['lastname'];
				}

				if(($input['birthdate'] != $user->birthdate)&&($input['birthdate'] != '')){
					$user->birthdate = $input['birthdate'];
				}

				if((Hash::make($input['pass1']) != $user->password)&&($input['pass1'] != '')){
					$user->password = Hash::make($input['pass1']);;

				}

				$user->save();
			}

			// Making sure user addon session is not there
			Session::forget('userAddons');

			return View::make('home.profile');
		}else{
			return View::make('home.index');
		}
	}

	public function action_addons(){

		if(Auth::check()){

			$user = Auth::user();

			$addons = $user->addons()->get();

			// Clearing sessions
			if (Session::has('addons')) {
				Session::forget('addons');
			}

			if (Session::has('category')) {
				Session::forget('category');
			}

			if (Session::has('tag')) {
				Session::forget('tag');
			}

			if (Session::has('search')) {
				Session::forget('search');
			}

			// Creating search result session
			Session::put('userAddons', $addons);

			return View::make('home.userAddons');
		}else{
			return View::make('home.index');
		}

	}

	public function action_modify(){

		if(Auth::check()){

			$user = Auth::user();

			// Getting addon ID
			$addonId = Input::get('id');

			if(!empty($input)){

				// Getting addon ID
				$addonId = Input::get('id');

				// Getting addon info from DB
				$addon = Addon::where('id', '=', Input::get('id'))->first();


				var_dump($addon);
				// Setting up rules for validation
				$rules = array(
					'addonName' => 'max:50',
					'addonAuthor' => 'max:50',
					'addonProfile' => 'mimes:zip|max:3145728',
					'pictureProfile' => 'image|max:500000',
					);

		        // Validating the form info
				$validation = Validator::make($input, $rules);

		        // If validation fails returns to the previous page with errors
				if( $validation->fails() ) {
					return Redirect::back()->with_errors($validation);
				}

		        // if input addonUpload has been filled
				if(Input::has('addonProfile')){

				 // Getting addon extension
					$addonExtension = File::extension($input['addonProfile']['name']);

	        	// Using sha1 encription to generate file location name
					$addonDirectory = 'public/_uploads/addons/'.sha1(Auth::user()->id);

	        	// Using sha1 encription to generate file name
					$addonFilename = sha1(Auth::user()->id.time()).".{$addonExtension}";

	        	// Uploading addon
					$add_upload_success = Input::upload('addonProfile', $addonDirectory, $addonFilename);

	        	// if upload is successful
					if ($add_upload_success) {

	        		// Saving new location of addon
						$addon()->location = 'public/_uploads/addons/'.sha1(Auth::user()->id).'/'.$addonFilename;
					}

				var_dump($addon);
				}

				// Sanitizing the description text
				if( isset($input['addonDescription']) ) {
					$input['addonDescription'] = filter_var($input['addonDescription'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
				}

				if(Input::has('pictureProfile')){

		        // Getting picture extension (zip, jpg, ...)
					$pictureExtension = File::extension($input['pictureProfile']['name']);

	        	// Using sha1 encription to generate file location name
					$pictureDirectory = 'public/_uploads/pictures/'.sha1(Auth::user()->id);
					$thumbFeatDirectory = 'public/_uploads/thumbsFeat/'.sha1(Auth::user()->id);
					$thumbCatDirectory = 'public/_uploads/thumbsCat/'.sha1(Auth::user()->id);

				// Using sha1 encription to generate random file name and adding extension
					$pictureFilename = sha1(Auth::user()->id.time()).".{$pictureExtension}";

		         // Resize and upload of picture
					$image = Input::file('pictureProfile');

					$pic_upload_success = Resizer::open($image)
					->resize(466 , 351 , 'auto')
					->save( $pictureDirectory.'/'.$pictureFilename , 90);

					$thumbFeat_upload_success = Resizer::open($image)
					->resize(466 , 345 , 'crop')
					->save( $thumbFeatDirectory.'/'.$pictureFilename , 90);

					$thumbCat_upload_success = Resizer::open($image)
					->resize(260 , 200 , 'crop')
					->save( $thumbCatDirectory.'/'.$pictureFilename , 90);

				// Testing if upload was successful
					if($pic_upload_success && $thumbFeat_upload_success && $thumbCat_upload_success) {
						$addon()->pictures()->location = '_uploads/pictures/'.sha1(Auth::user()->id).'/'.$pictureFilename;
						$addon()->pictures()->thumbfeat = '_uploads/thumbsFeat/'.sha1(Auth::user()->id).'/'.$pictureFilename;
						$addon()->pictures()->thumbfeat = '_uploads/thumbsCat/'.sha1(Auth::user()->id).'/'.$pictureFilename;
					}
				}

			}


	        // 	// setting up array with picture info
	        // 	$picture = new Picture(array(
	        //     	'addon_id' => $addon->id,
	        //         'location' => '_uploads/pictures/'.sha1(Auth::user()->id).'/'.$pictureFilename,
	        //         'thumbfeat' => '_uploads/thumbsFeat/'.sha1(Auth::user()->id).'/'.$pictureFilename,
	        //         'thumbcat' => '_uploads/thumbsCat/'.sha1(Auth::user()->id).'/'.$pictureFilename,
	        //      ));

	        // 	// Adding picture info to database
	        //     $addon->pictures()->save($picture);


	        // // testing if addon and pictures were succesfully uploaded
	        // if( $add_upload_success && $pic_upload_success && $thumbFeat_upload_success && $thumbCat_upload_success) {

	        // 	// Setting up array with addon information
	        // 	$addon = new Addon(array(
	        //     	'name' => $input['addonName'],
	        //     	'version' => $input['addonVersion'],
	        //     	'author' => $input['addonAuthor'],
	        //     	'description' => $input['addonDescription'],
	        //     	'category_id' => $input['category'],
	        //         'location' => 'public/_uploads/addons/'.sha1(Auth::user()->id).'/'.$addonFilename,
	        //      ));

	        // 	// Adding addon info to the database
	        // 	Auth::user()->addons()->save($addon);


	        // 	// Generating tags for addons

	        // 	// Getting addon description text
	        // 	$description = Str::lower($input['addonDescription']);

	        // 	// Getting tag list from DB
	        // 	$tags = Tag::get();

	        // 	// For each tag
		       //  foreach ($tags as $tag) {

		       //  	// Changing tag name to lower text
		       //  	$tagName = Str::lower($tag->name);

		       //  	// Looking in description for the tag
		       //  	$tagPos = strpos($description, $tagName);

		       //  	// if tag is found in description
		       //  	if($tagPos != FALSE){

		       //  		// Getting the tag id
		       //  		$tagId = $tag->id;

		       //  		// Inserting the tag id and addon id into the Addon_Tag relational table (many-to-many)
		       //  		$addon->tags()->attach($tagId);

		       //  	}
		       //  }



	        //     // Making sure user addon session is not there
	        //     Session::forget('userAddons');

	        //     // echo 'success';
	        //     Session::flash('status_success', 'Successfully uploaded your new addon');
	        // } else {
	        //     Session::flash('status_error', 'An error occurred while uploading your new addon - please try again.');
	        // 	// echo('failed');
	        // }
	        // return Redirect::to('profile/addons');

			// return View::make('home.userAddons');
		}else{
			return View::make('home.index');
		}

	}

	public function action_delete(){

		if(Auth::check()){

			$user = Auth::user();

			$addonId = Input::get('id');

			$addon = Addon::where('id', '=', $addonId)->first();

			$addon->visible = 0;

			$addon->save();

			if (Session::has('addons')) {
				Session::forget('addons');
			}

			$addons = Addon::where('user_id', '=', $user->id)->get();
			// Creating search result session
			Session::put('userAddons', $addons);

			return View::make('home.userAddons');
		}else{
			return View::make('home.index');
		}

	}
}

?>