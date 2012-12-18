<?php

class Create_Visit_Type_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_visit_types', function($table)
		{
			$table->increments('id');
			$table->string('visit_type');
			$table->string('notes');
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
		Schema::drop('ref_visit_types');
	}

}