<?php

class Create_Addons {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addons',function($table){

		$table->increments('id');
		$table->string('name',255);
		$table->foreign('user_id')->references('id')->on('users');
		$table->integer('rating',1);
		$table->string('description',2000);
		$table->timestamps('uploaded_at');
		$table->timestamps('updated_at');
		$table->integer('downloaded',100);
		$table->foreign('category_id')->references('id')->on('categories');
		$table->string('location',64);
		$table->string('visible',1);

		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}