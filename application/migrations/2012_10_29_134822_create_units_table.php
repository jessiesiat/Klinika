<?php

class Create_Units_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_units', function($table)
		{
            $table->increments('id');
            $table->string('unit');
            $table->string('conversion_operator');
            $table->integer('conversion_to_unit');
            $table->float('conversion_value');
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
		Schema::drop('hc_units');
	}

}