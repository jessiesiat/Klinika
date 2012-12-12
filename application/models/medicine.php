<?php

class Medicine extends Elegant {
	
	public static $table = 'hc_medicines';

	protected $rules = array(
			'medicine_name' => 'required',
			'price' => 'numeric',
			'selling_price' => 'required|numeric'
		);

	public static function onHand($medicine_id)
	{
		
	}

}