<?php

class Create_Doctor_Staff_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_doctors_staff', function($table)
		{
			$table->increments('id');
			$table->string('f_name', 25);
			$table->string('l_name', 25);
			$table->string('m_name', 25);
			$table->string('specialization');
			$table->string('education');
			$table->string('gender', 10);
			$table->string('email', 45);
			$table->date('birthdate');
			$table->string('landline_work');
			$table->string('landline_home');
			$table->string('mobile');
			$table->string('address');
			$table->text('notes');
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
		Schema::drop('hc_doctors_staff');
	}

}