<?php

class Admin_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		if (Auth::user()-> role == 100) {

			return View::make('admin.dashboard');

		}else{

			return View::make('home');
		}
	}

	public function action_adduser(){

			// Aquiring data from admin add user forms
			$username = Input::get('userEmail');
			$lastname = Input::get('lastname');
			$firstname = Input::get('firstname');
			$birthdate = Input::get('birthdate');
			$role = Input::get('role');
			$password = Input::get('password');

			// php form validation commented out - now using HTML5 pattern validation
			$input = array(
			'username' => $username,
			'lastname' => $lastname,
			'firstname' => $firstname,
			'birthdate' => $birthdate,
			'role' => $role,
			'password' => $password
			);

			$rules = array(
				'username' => 'required|email|unique:users,username',
				'lastname' => 'required|alpha|max:50',
				'firstname' => 'required|alpha|max:50',
				'birthdate' => 'required',
				'role' => 'between:0,100',
				'password' => 'required',

			);

			$validation = Validator::make($input, $rules);

			if ($validation->fails()) {

				return Redirect::back()->with_input()->with_errors($validation);

			}

			// Adding new user to the DB
			try{
				$user = new User();
				$user->username = $username;
				$user->lastname = $lastname;
				$user->firstname = $firstname;
				$user->birthdate = $birthdate;
				$user->role = $role;
				$user->password = Hash::make($password);

				$dbSave = $user->save();


				// Authentication of new user
				if ($dbSave) {

					// Using sha1 encription to generate file location name
			        $addonDirectory = 'public/_uploads/addons/'.sha1($user->id);
					$pictureDirectory = 'public/_uploads/pictures/'.sha1($user->id);
					$thumbFeatDirectory = 'public/_uploads/thumbsFeat/'.sha1($user->id);
					$thumbCatDirectory = 'public/_uploads/thumbsCat/'.sha1($user->id);

					// Creating new user upload directory
					mkdir($addonDirectory);
					mkdir($pictureDirectory);
					mkdir($thumbFeatDirectory);
					mkdir($thumbCatDirectory);

					// Making sure user addon session is not there
					Session::forget('userAddons');

					$usersObj = User::get();

					foreach ($usersObj as $user) {
						$users[] = $user->to_array();
					}


					Session::put('users', $users);


					return View::make('admin.users');
				}

			}catch(Exception $e){

				Session::flash('status_error', 'An error occurred while creating a new account - please try again.');

			}

	}

	public function action_addons(){

		if (Auth::user()-> role == 100) {

			$addonsData = Addon::get();

			$addons = array_map(function($addonsData){
				return $addonsData->to_array();
			}, $addonsData);

			foreach ($addons as $addon) {
				unset($addon['description']);
				unset($addon['location']);
				$addonsDisplay[] = $addon;
			}

			Session::put('addonsDisplay', $addonsDisplay);
			Session::put('addons', $addons);

			return View::make('admin.addons');

		}else{

			return View::make('home');
		}
	}

		public function action_deleteuser(){

			// Getting id string from URL
			$idsInput = Input::get('id');

			if(!empty($idsInput)){
				// Placing id(s) into an array
				$idsArray = explode('check_', $idsInput);

				// Deleting array empty value
				foreach ($idsArray as $id) {
					if ($id != '') {
						$ids[] = $id;
					}
				}

				// For each id present in array
				foreach ($ids as $id) {

					// Setting up empty variable
					$addonUpdate = '';

					// Getting user information from DB
					$user = User::where('id', '=', $id)->first();

					// Getting addons from user
					$addons = Addon::where('user_id', '=', $id)->get();

					$addonDirectory = 'public/_uploads/addons/'.sha1($user->id);
					$pictureDirectory = 'public/_uploads/pictures/'.sha1($user->id);
					$thumbFeatDirectory = 'public/_uploads/thumbsFeat/'.sha1($user->id);
					$thumbCatDirectory = 'public/_uploads/thumbsCat/'.sha1($user->id);

					// Checking if user has addons
					if (!empty($addons)) {

						// For each addons
						foreach($addons as $addon){

							// ADDON
							// Changing the user ownership to admin
							$addon->user_id = Auth::user()->id;

							// Getting old file location from DB
							$oldFileLoc = $addon->location;

							// Placing directory into an array
							$addonLocArray = explode('/', $oldFileLoc);

							// Constructing back old Directory
							$addonOldDir = $addonLocArray['0'].'/'.$addonLocArray['1'].'/'.$addonLocArray['2'].'/'.$addonLocArray['3'];

							// Getting file name from directory array
							$fileName = $addonLocArray['4'];

							// Setting up new directory for file
							$newFileLoc = 'public/_uploads/addons/'.sha1(Auth::user()->id);

							// Moving file to new directory
							$fileMoveSuccess = File::move($oldFileLoc, $newFileLoc.'/'.$fileName);

							// PICTURES
							// Getting addon's picture from DB
							$picture = Picture::where('addon_id', '=', $addon->id)->first();

							// Getting pictures location
							$picOldLoc = $picture->location;
							$featOldLoc = $picture->thumbfeat;
							$catOldLoc = $picture->thumbcat;

							// Placing pictures dir into an array
							$picLocArray = explode('/', $picOldLoc);
							$featLocArray = explode('/', $featOldLoc);
							$catLocArray = explode('/', $catOldLoc);

							// Setting up new directory for pictures
							$picNewLocDB = '_uploads/pictures/'.sha1(Auth::user()->id);
							$featNewLocDB = '_uploads/thumbsFeat/'.sha1(Auth::user()->id);
							$catNewLocDB = '_uploads/thumbsCat/'.sha1(Auth::user()->id);

							// Getting pictures file names
							$picFileName = $picLocArray['3'];
							$featFileName = $featLocArray['3'];
							$catFileName = $catLocArray['3'];

							// Setting up new picutre URL for DB
							$picNewLocDir = 'public/_uploads/pictures/'.sha1(Auth::user()->id);
							$featNewLocDir = 'public/_uploads/thumbsFeat/'.sha1(Auth::user()->id);
							$catNewLocDir = 'public/_uploads/thumbsCat/'.sha1(Auth::user()->id);

							// Moving pictures from old to new dir
							$picMoveSuccess = File::move('public/'.$picOldLoc, $picNewLocDir.'/'.$picFileName);
							$featMoveSuccess = File::move('public/'.$featOldLoc, $featNewLocDir.'/'.$featFileName);
							$catMoveSuccess = File::move('public/'.$catOldLoc, $catNewLocDir.'/'.$catFileName);

							// If moves are successful
							if ($fileMoveSuccess && $picMoveSuccess && $featMoveSuccess && $catMoveSuccess) {

							 	// Setting new location of file
							 	$addon->location = $newFileLoc.'/'.$fileName;

							 	// Setting new pictures location for DB
							 	$picture->location = $picNewLocDB.'/'.$picFileName;
							 	$picture->thumbfeat = $featNewLocDB.'/'.$featFileName;
							 	$picture->thumbcat = $catNewLocDB.'/'.$catFileName;

							 	// Updating DB
							 	$addonUpdate = $addon->save();
							 	$pictureUpdate = $picture->save();
							}

						}


					}

					// Removing user directory
					File::rmdir($addonDirectory);
					File::rmdir($pictureDirectory);
					File::rmdir($thumbFeatDirectory);
					File::rmdir($thumbCatDirectory);

					// Deleting user from DB
					$userDeleteSuccess =$user->delete();
				}

				// if updates and delete succesfull redirect
				if($userDeleteSuccess && $addonUpdate && $pictureUpdate){

					Session::flash('deleteUserSuccess', 'Deleted the user(s)!');

				}else{
					Session::flash('deleteUserFail', 'User(s) delete failed - please try again.');

				}
			}

			$usersData = User::get();

			$users = array_map(function($usersData){
				return $usersData->to_array();
			}, $usersData);

			Session::put('users', $users);

			return View::make('admin.users');
			// var_dump($ids);
	}


	public function action_files(){

		if (Auth::user()-> role == 100) {



			return View::make('admin.files');

		}else{

			return View::make('home');
		}
	}

	public function action_profile(){

		if (Auth::user()-> role == 100) {



			return View::make('admin.profile');

		}else{

			return View::make('home');
		}
	}

	public function action_users(){

		if (Auth::user()-> role == 100) {

			$usersData = User::get();

			$users = array_map(function($usersData){
				return $usersData->to_array();
			}, $usersData);

			Session::put('users', $users);

			return View::make('admin.users');

		}else{

			return View::make('home');
		}
	}
}

?>