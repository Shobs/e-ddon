<?php

class Create_Addon_Category {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addon_category',function($table){
		$table->engine = 'InnoDB';
		$table->increments('id');
		$table->string('name',255);
		$table->integer('addon_id')->index();
		$table->integer('category_id')->index();

		// $table->foreign('addon_id')->references('id')->on('addons')->on_delete('no action');
		// $table->foreign('addon_id')->references('id')->on('addons')->on_update('cascade');
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
		Schema::drop('addon_category');
	}

}