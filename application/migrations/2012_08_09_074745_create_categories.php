<?php

class Create_Categories {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories',function($table){
		$table->engine = 'InnoDB';
		$table->increments('id');
		$table->string('name',255);
		$table->text('description',2000);
		$table->boolean('visible')->default(1);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}

}