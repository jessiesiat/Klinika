<?php

class PatientAwait extends Elegant {
	
	public static $table = 'hc_patients_awaits';

	public static $timestamps = false;

	protected $rules = array(
		'patient_id' => 'required|numeric',
		'complaint' => 'required|min:3',
		);

	public function patient()	
    {
    	return $this->belongs_to('Patient', 'patient_id');
    }

    public function appointment()
    {
    	return $this->belongs_to('Appointment', 'appointment_id');
    }

}