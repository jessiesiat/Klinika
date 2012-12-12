<?php

class Create_Payment_Mode_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_payment_modes', function($table){
			$table->increments('id');
			$table->string('code', 12);
			$table->string('desc');
			$table->timestamps();
		});

		DB::table('hc_payment_modes')->insert(array(
				'code' => 'paybill',
				'desc' => 'biling',
			));
		DB::table('hc_payment_modes')->insert(array(
				'code' => 'paycash',
				'desc' => 'cash payment',
			));
		DB::table('hc_payment_modes')->insert(array(
				'code' => 'paycard',
				'desc' => 'credit card payment',
			));
		DB::table('hc_payment_modes')->insert(array(
				'code' => 'payco',
				'desc' => 'company payment',
			));
		DB::table('hc_payment_modes')->insert(array(
				'code' => 'payhmo',
				'desc' => 'hmo payment',
			));

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_payment_modes');
	}

}