<?php

class DoctorStaff extends Elegant {
	
	public static $table = 'hc_doctors_staff';

	protected $rules = [
			'f_name' => 'required|min:2',
			'l_name' => 'requiredmin:2',
			'email' => 'email'
		];

}