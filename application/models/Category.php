<?php

class Category extends Eloquent {
	//setting $timestanp to true so Eloquent
	//will automatically set the created_at
	//and updated_at values
	public static $timestanp = true;
	public static $table = 'categories';

	public function addons(){
		return $this->has_many('Addon');
	}
}

?>