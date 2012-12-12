<?php

class Create_Patients_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_patients', function($table)
		{
			$table->increments('id');
			$table->string('f_name', 25);
			$table->string('l_name', 25);
			$table->string('m_name', 25);
			$table->string('address1');
			$table->string('address2');
			$table->string('mobile');
			$table->string('landline_home');
			$table->string('landline_work');
			$table->string('email', 45);
			$table->string('birthdate');
			$table->string('gender', 10);
			$table->string('race', 25);	
			$table->string('education');
			$table->string('marital_status', 12);
			$table->boolean('smoker');
			$table->boolean('drinker');
			$table->string('blood_type', 4);
			$table->string('patient_type', 25);
			$table->string('spouse_name', 45);
			$table->string('spouse_contact_no', 22);
			$table->text('notes');
			$table->string('picture');
			//Billing Information
			$table->string('company');
			$table->string('hmo', 55);
			$table->string('hmo_no', 55);
			$table->string('credit_card', 35);
			$table->string('insurance');
			$table->timestamps();
		});

		DB::table('hc_patients')->insert(array(
				'f_name' => 'Juan',
				'l_name' => 'Dela Cruz',
				'address1' => 'Quiapo Manila',
				'gender' => 'Male'
			));
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_patients');
	}

}