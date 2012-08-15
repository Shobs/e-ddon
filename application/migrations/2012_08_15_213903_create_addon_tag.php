<?php

class Create_Addon_Tag {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addon_tag', function($table){

			// Select InnoDB engine for DB
			$table->engine = 'InnoDB';

			$table->increments('id');
			$table->integer('tag_id', 11);
			$table->integer('addon_id', 11);

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addon_tag');
	}

}