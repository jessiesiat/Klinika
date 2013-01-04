<?php

class Create_Uom_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_uom', function($table)
		{
			$table->increments('id');
			$table->string('uom');
			$table->text('uom_desc');
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
		Schema::drop('ref_uom');
	}

}