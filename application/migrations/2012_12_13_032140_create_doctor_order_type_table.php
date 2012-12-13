<?php

class Create_Doctor_Order_Type_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_doctor_order_types', function($table)
		{
			$table->increments('id');
			$table->string('order_type');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ref_doctor_order_types');
	}

}