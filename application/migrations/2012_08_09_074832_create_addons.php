<?php

class Create_Addons {

	/**
	 * Creates the addons table
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addons',function($table){

		// Select InnoDB engine for DB
		$table->engine = 'InnoDB';

		// Create table
		$table->increments('id');
		$table->string('name',255);
		$table->integer('user_id')->index();
		$table->string('author', 255);
		$table->integer('rating')->default(0);
		$table->text('description',2000);
		$table->integer('downloaded');
		$table->timestamps();
		$table->integer('category_id')->index();
		$table->string('location',64);
		$table->boolean('visible');

		// Setup foreign keys relationship
		// $table->foreign('user_id')->references('id')->on('users')->on_delete('no action');
		// $table->foreign('user_id')->references('id')->on('users')->on_update('cascade');
		// $table->foreign('category_id')->references('id')->on('categories')->on_delete('no action');
		// $table->foreign('category_id')->references('id')->on('categories')->on_update('cascade');
		});
	}



	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('addons');
	}

}