<?php

class Create_Pictures {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pictures',function($table){
		$table->engine = 'InnoDB';
		$table->increments('id');
		$table->integer('addon_id')->index();
		$table->string('location',64);
		$table->boolean('visible')->default(1);
		$table->timestamps();

		// $table->foreign('addon_id')->references('id')->on('addons')->on_delete('no action');
		// $table->foreign('addon_id')->references('id')->on('addons')->on_update('cascade');

		});

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pictures');
	}

}