<?php

class Create_Medecine_In_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_medicine_in', function($table)
		{
			$table->increments('id');
            $table->integer('medicine_id');
            $table->decimal('qty', 9, 2);
            $table->string('uom');
            $table->integer('supplier_id');
            $table->string('or_number');
            $table->date('date_received');
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
		Schema::drop('hc_medicine_in');
	}

}