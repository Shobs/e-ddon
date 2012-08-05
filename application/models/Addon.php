<?php

class Addon extends Eloquent{
	public static $timestamps = true;
	public static $table = 'addons';

	public function user(){
		return $this->belongs_to('User');
	}

	public function picture(){
		return $this->has_many('Picture');
	}

}