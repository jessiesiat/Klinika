<?php

class MedicineIn extends Elegant {
	
	public static $table = 'hc_medicine_in';

	public static $accessible = array('medicine_id', 'uom', 'qty', 'supplier_id', 'or_number', 'date_received');

	protected $rules = array(
					'medicine_id' => 'required|numeric',
					'qty' => 'required|numeric',
					'uom' => 'required',
					);
	
}