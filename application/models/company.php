<?php

class Company extends Elegant {
	
	public static $table = 'hc_company';

	protected $rules = array(
			'company_name' => 'required',
		);

}