<?php

class Test_Controller extends Base_Controller{

	// public $restful = true;

	public function action_index(){

		$user = User::find(7);


		$user->lastname = 'toto';


		$user->save();

	}

	public function post_users(){



	}
}

?>