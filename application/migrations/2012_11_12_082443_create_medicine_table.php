<?php

class Create_Medicine_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hc_medicines', function($table)
		{
			$table->increments('id');
			$table->string('medicine_name');
			$table->integer('type')->unsigned(); // 1-branded, 0-generic, 
			$table->text('desc');
			$table->integer('supplier_id')->unsigned();
			$table->string('purchase_uom', 25);
			$table->integer('purchase_size_qty');
			$table->decimal('purchase_cost', 9, 2);
			$table->float('purchase_tax');
			$table->string('selling_uom', 25);
			//$table->integer('selling_size_qty');
			$table->decimal('selling_price', 9, 2);
			$table->float('selling_tax');
			$table->integer('on_hand');
			//$table->integer('unit_id');
			$table->timestamps();
		});

		DB::table('hc_medicines')->insert(array(
				'medicine_name' => 'Alaxan FR',
				'selling_price' => 8,
				'desc' => 'for body pain',
			));
		DB::table('hc_medicines')->insert(array(
				'medicine_name' => 'Medicol Advance',
				'selling_price' => 9,
				'desc' => 'for fever',
			));
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hc_medicines');
	}

}