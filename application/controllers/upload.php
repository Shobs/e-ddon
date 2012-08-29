<?php

class Upload_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		// Getting all inputs from upload form
		$input = Input::all();

		// Sanitizing the description text
        if( isset($input['addonDescription']) ) {
            $input['addonDescription'] = filter_var($input['addonDescription'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        }

        // Setting up my rules for validation
        $rules = array(
        	'addonName' => 'required|max:50',
        	'addonVersion' => 'required',
			'addonAuthor' => 'required|max:50',
 			'addonDescription' => 'required',
			'addonUpload' => 'required|mimes:zip,rar|max:3145728',
			'pictureUpload' => 'required|image|max:500000',
        );

        // Validating the form info
        $validation = Validator::make($input, $rules);

        // If validation fails returns to the previous page with errors
        if( $validation->fails() ) {
            return Redirect::back()->with_errors($validation);
        }

        // Getting addon and picture extension (zip, jpg, ...)
        $addonExtension = File::extension($input['addonUpload']['name']);
        $pictureExtension = File::extension($input['pictureUpload']['name']);

        // Using sha1 encription to generate file location name
        $addonDirectory = 'public/_uploads/addons/'.sha1(Auth::user()->id);
		$pictureDirectory = 'public/_uploads/pictures/'.sha1(Auth::user()->id);
		$thumbFeatDirectory = 'public/_uploads/thumbsFeat/'.sha1(Auth::user()->id);
		$thumbCatDirectory = 'public/_uploads/thumbsCat/'.sha1(Auth::user()->id);

		// Using sha1 encription to generate random file name and adding extension
        $addonFilename = sha1(Auth::user()->id.time()).".{$addonExtension}";
        $pictureFilename = sha1(Auth::user()->id.time()).".{$pictureExtension}";

        // testing
        // var_dump($category);


        // Uploading addon
        $add_upload_success = Input::upload('addonUpload', $addonDirectory, $addonFilename);

        // Resize and upload of picture
        $image = Input::file('pictureUpload');

        $pic_upload_success = Resizer::open($image)
			    ->resize(466 , 351 , 'auto')
			    ->save( $pictureDirectory.'/'.$pictureFilename , 90);

		// $thumbFeat = Input::file('pictureUpload');

		$thumbFeat_upload_success = Resizer::open($image)
			    ->resize(466 , 345 , 'crop')
			    ->save( $thumbFeatDirectory.'/'.$pictureFilename , 90);

		// $thumbCat = Input::file('pictureUpload');

		$thumbCat_upload_success = Resizer::open($image)
			    ->resize(260 , 200 , 'crop')
			    ->save( $thumbCatDirectory.'/'.$pictureFilename , 90);

        // testing if addon and pictures were succesfully uploaded
        if( $add_upload_success && $pic_upload_success && $thumbFeat_upload_success && $thumbCat_upload_success) {

        	// Setting up array with addon information
        	$addon = new Addon(array(
            	'name' => $input['addonName'],
            	'version' => $input['addonVersion'],
            	'author' => $input['addonAuthor'],
            	'description' => $input['addonDescription'],
            	'category_id' => $input['category'],
                'location' => 'public/_uploads/addons/'.sha1(Auth::user()->id).'/'.$addonFilename,
             ));

        	// Adding addon info to the database
        	Auth::user()->addons()->save($addon);


        	// Generating tags for addons

        	// Getting addon description text
        	$description = Str::lower($input['addonDescription']);

        	// Getting tag list from DB
        	$tags = Tag::get();

        	// For each tag
	        foreach ($tags as $tag) {

	        	// Changing tag name to lower text
	        	$tagName = Str::lower($tag->name);

	        	// Looking in description for the tag
	        	$tagPos = strpos($description, $tagName);

	        	// if tag is found in description
	        	if($tagPos != FALSE){

	        		// Getting the tag id
	        		$tagId = $tag->id;

	        		// Inserting the tag id and addon id into the Addon_Tag relational table (many-to-many)
	        		$addon->tags()->attach($tagId);

	        	}
	        }

        	// setting up array with picture info
        	$picture = new Picture(array(
            	'addon_id' => $addon->id,
                'location' => '_uploads/pictures/'.sha1(Auth::user()->id).'/'.$pictureFilename,
                'thumbfeat' => '_uploads/thumbsFeat/'.sha1(Auth::user()->id).'/'.$pictureFilename,
                'thumbcat' => '_uploads/thumbsCat/'.sha1(Auth::user()->id).'/'.$pictureFilename,
             ));

        	// Adding picture info to database
            $addon->pictures()->save($picture);

            // Making sure user addon session is not there
            Session::forget('userAddons');

            // echo 'success';
            Session::flash('status_success', 'Successfully uploaded your new addon');
        } else {
            Session::flash('status_error', 'An error occurred while uploading your new addon - please try again.');
        	// echo('failed');
        }

        if(Auth::user()->role == 100){

            return Redirect::to('admin/addons');
        }else{

            return Redirect::to('profile/addons');
        }
	}

}

?>