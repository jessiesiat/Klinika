<?php

class Appointment extends Elegant {
	
	public static $table = 'hc_appointments';

	public static $accessible = array('patient_id', 'status', 'date_time', 'notes');

	protected $rules = array(
			'patient' => 'required',
			'patient_id' => 'required|numeric',
			'date' => 'required',
			'date_time' => 'required',
		);

	public function patient()
	{
		return $this->belongs_to('Patient');
	}

}