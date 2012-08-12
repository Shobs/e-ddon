<?php

class Create_Tags {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags',function($table){
		$table->engine = 'InnoDB';
		$table->increments('id');
		$table->string('name',255);
		$table->boolean('visible');
		$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}

}