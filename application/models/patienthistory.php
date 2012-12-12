<?php

class PatientHistory extends Elegant {
	
	public static $table = 'hc_patients_history';
	public static $accessible = array('patient_id', 'date_time_in', 'bill_out', 'complaint', 'service_id', 'diagnosis', 'prescription', 'procedure', 'physical_exam');

	protected $rules = array(
			'patient_id' => 'required|integer',
			'date_time_in' => 'required',
			'complaint' => 'required',
			'service_id' => 'required|integer',
			'diagnosis' => 'required|min:2',
			'procedure' => 'required|min:2'
		);

	public function patient()
	{
		return $this->belongs_to('Patient');
	}

	public function medications()
	{
		return $this->has_many('PatientHistoryMedication', 'phistory_id');
	}

}