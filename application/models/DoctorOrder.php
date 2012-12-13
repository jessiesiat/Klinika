<?php

class DoctorOrder extends Elegant {
	
	public static $table = 'hc_doctor_orders';
	public static $accessible = array('patient_id', 'order_date', 'order_type_id', 'doctor_order', 'comment');

	protected $rules = array(
			'patient_id' => 'required|integer',
			'order_date' => 'required',
			'order_type_id' => 'required',
			'doctor_order' => 'required',
		);

	public function patient()
	{
		return $this->belongs_to('Patient');
	}

}