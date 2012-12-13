<?php

class Create_Doctor_Orders_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_doctor_orders', function($table)
		{
			$table->increments('id');
			$table->integer('patient_id');
			$table->date('order_date');
			$table->integer('order_type_id');
			$table->text('doctor_order');
			$table->string('comment');
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
		Schema::drop('hc_doctor_orders');
	}

}