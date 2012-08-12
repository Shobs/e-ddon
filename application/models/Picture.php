<?php

class Picture extends Eloquent{
	public static $timestamps = true;
	public static $table = 'pictures';

	public function addons(){
		return $this->belongs_to('Addon');
	}
}

?>