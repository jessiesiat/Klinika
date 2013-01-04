<?php

class Create_Suppliers_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_suppliers', function($table)
		{
            $table->increments('id');
            $table->string('supplier_name', 75);
            $table->text('address');
            $table->string('contact_number');
            $table->string('contact_person', 75);
            $table->string('email', 45);
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
		Schema::drop('hc_suppliers');
	}

}