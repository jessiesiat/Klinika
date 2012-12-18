<?php

class Create_Patient_Type_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_patient_types', function($table)
		{
			$table->increments('id');
			$table->string('patient_type');
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
		Schema::drop('ref_patient_types');
	}

}