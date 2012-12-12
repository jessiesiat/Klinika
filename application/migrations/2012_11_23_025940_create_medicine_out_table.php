<?php

class Create_Medicine_Out_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_medicine_out', function($table)
		{
			$table->increments('id');
			$table->string('from_trans'); //Model name from what transaction
			$table->integer('from_trans_id');
			$table->integer('medicine_id');
			$table->decimal('qty', 9, 2);
			$table->string('uom');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_medicine_out');
	}

}