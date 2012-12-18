<?php

class Create_Payment_Mode_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_payment_modes', function($table)
		{
			$table->increments('id');
			$table->string('payment_mode');
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
		Schema::drop('ref_payment_modes');
	}

}