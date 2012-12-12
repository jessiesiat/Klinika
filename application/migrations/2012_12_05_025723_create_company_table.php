<?php

class Create_Company_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_company', function($table)
		{
			$table->increments('id');
			$table->string('company_name');
			$table->string('contact_person');
			$table->string('type', 35);
			$table->string('address1');
			$table->string('address2');
			$table->string('phone_no', 25);
			$table->string('fax_no', 35);
			$table->string('web_page', 40);
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
		Schema::drop('hc_company');
	}

}