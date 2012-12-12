<?php

class Service extends Elegant {
	
	public static $table = 'hc_services';

	protected $rules = [
			'service_name' => 'required',
			];

}	