<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('users',function($table){

		$table->increments('id');
		$table->string('username',100);
		$table->string('lastname',255);
		$table->string('firstname',255);
		$table->date('birthdate',64);
		$table->string('country',255);
		$table->string('password',100);
		$table->string('comments',64);
		$table->string('admin',64);
		$table->string('visible',1);
		$table->timestamps();
		});

		DB::table('users')->insert(array(
		'username'=>'admin',
		'password'=>Hash::make('Ruomale1'),
		'name'=>'Admin'

		));



}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($user);
	}

}