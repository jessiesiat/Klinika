<?php

class Create_Appointment_Reason_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_appointment_reasons', function($table)
		{
			$table->increments('id');
			$table->string('reason');
			$table->date('duration');
			$table->integer('slots');
			$table->timestamps();
		});

		DB::table('hc_appointment_reasons')->insert(array(
				'reason' => 'Re-Exam',
				'duration' => '1',
				'slots' => '1'
			));
		DB::table('hc_appointment_reasons')->insert(array(
				'reason' => 'OB Gyne Exam',
				'duration' => '1',
				'slots' => '1'
			));
		DB::table('hc_appointment_reasons')->insert(array(
				'reason' => 'Regular Office Visit',
				'duration' => '1',
				'slots' => '1'
			));
		DB::table('hc_appointment_reasons')->insert(array(
				'reason' => 'Therapy',
				'duration' => '1',
				'slots' => '1'
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_appointment_reasons');
	}

}