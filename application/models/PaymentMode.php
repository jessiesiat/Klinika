<?php

class PaymentMode extends Elegant {
	
	public static $table = 'ref_payment_modes';

	protected $rules = array(
			'payment_mode' => 'required',
		);

}