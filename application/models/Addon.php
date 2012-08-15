<?php

class Addon extends Eloquent{
	public static $timestamps = true;
	public static $table = 'addons';

	public function users(){
		return $this->belongs_to('User');
	}

	public function categories(){
		return $this->belongs_to('Category');
	}

	public function pictures(){
		return $this->has_many('Picture');
	}

	public function tags(){
		return $this->has_many_and_belongs_to('Tag', 'addon_tag');
	}

}