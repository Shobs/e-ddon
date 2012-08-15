<?php

class Addon_tag extends Eloquent{

	public static $table = 'addon_tag';

	public function addons(){
		return $this->has_many('Addon');
	}

	public function tags(){
		return $this->has_many('Tag');
	}

}