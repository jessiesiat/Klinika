<?php

class Create_Appointments_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_appointments', function($table)
		{
            $table->increments('id');
            $table->integer('patient_id');
            $table->integer('status')->default(0); // 0=active, 1=(is in) 2=completed, 3=cancelled
            $table->integer('reason_id');
            $table->date('date_time'); //date and time
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
		Schema::drop('hc_appointments');
	}

}