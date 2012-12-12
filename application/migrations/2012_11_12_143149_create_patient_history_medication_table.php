<?php

class Create_Patient_History_Medication_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_patient_history_medications', function($table)
		{
            $table->increments('id');
            $table->integer('phistory_id');
            $table->integer('medicine_id');
            $table->string('uom');
            $table->integer('qty');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_patient_history_medications');
	}

}