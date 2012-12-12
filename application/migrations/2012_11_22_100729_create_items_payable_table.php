<?php

class Create_Items_Payable_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_items_payable', function($table){
			$table->increments('id');
			$table->string('from_trans'); //Model name to which the payable came from.
			$table->integer('from_trans_id'); //primary id of the transaction from table
			$table->decimal('amount_due', 9, 2);
			$table->decimal('amount_paid', 9, 2);
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
		Schema::drop('hc_items_payable');
	}

}