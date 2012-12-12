<?php

class Create_Tests_Procedures_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_tests_procedures', function($table)
		{
			$table->increments('id');
			$table->string('test_procedure');
			$table->string('duration', 8);
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
		Schema::drop('hc_tests_procedures');
	}

}