<?php

class Create_Patients_Awaits_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_patients_awaits', function($table) 
		{
			$table->increments('id');
			$table->integer('patient_id');
			$table->text('complaint');
			$table->integer('service_id')->default(1);
			$table->date('time_in');
			$table->boolean('is_appointment')->default(0); // 1(true) = from an appointment
			$table->integer('appointment_id');
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
		Schema::drop('hc_patients_awaits');
	}

}