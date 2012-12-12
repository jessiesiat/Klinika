<?php

class Supplier extends Elegant {
	
	public static $table = 'hc_suppliers';

	protected $rules = array(
			'supplier_name' => 'required',
			'address' => 'required',
			'email' => 'email'
		);

}