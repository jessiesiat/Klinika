<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_users', function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('username', 64)->unique();
			$table->string('email', 55)->unique();
			$table->string('password', 100);
			$table->string('last_login');
			$table->timestamps();
		});

		DB::table('hc_users')->insert(array(
				'name' => 'admin',
				'username' => 'admin',
				'password' => Hash::make('admin')
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_users');
	}

}