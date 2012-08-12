<?php

class Create_Users {

	/**
	 * Creates the Users table and adds admin user
	 *
	 * @return void
	 */
	public function up(){

		Schema::create('users',function($table){
		$table->increments('id');
		$table->string('username', 100)->unique();
		$table->string('password', 100);
		$table->string('lastname', 255);
		$table->string('firstname', 255);
		$table->date('birthdate', 64);
		$table->text('comments', 1000)->nullable();
		$table->integer('role');
		$table->boolean('visible');
		$table->timestamps();
		});

		DB::table('users')->insert(array(
		'username'=>'marcellinja@gmai.com',
		'password'=>Hash::make('Ruomale1'),
		'role'=> 100,

		));



}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop($users);
	}

}