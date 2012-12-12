<?php

class Create_Patients_History_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_patients_history', function($table)
		{
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
			$table->date('date_time_in');
			$table->boolean('is_billed')->default(0);	//flag: 0-(not billed), 1-billed
			$table->date('bill_out');
			$table->integer('service_id')->unsigned();
			$table->text('complaint'); 
			$table->text('procedure'); // or test undergone
			$table->text('physical_exam');
			$table->text('diagnosis');
			$table->text('prescription'); // maybe remove ???
			$table->string('result');
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
		Schema::drop('hc_patients_history');
	}

}