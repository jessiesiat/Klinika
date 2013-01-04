<?php

class Create_Clinic_Info_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_clinic_info', function($table)
		{
			$table->increments('id');
			$table->string('clinic_name');
			$table->string('clinic_address');
			$table->string('clinic_email');
			$table->string('clinic_dept');
			$table->string('clinic_type');
			$table->timestamps();
		});

		DB::table('ref_clinic_info')->insert([
			'clinic_name' => '-'
			]);
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ref_clinic_info');
	}

}