<?php

class Patient extends Elegant {
	
	public static $table = 'hc_patients';

	public static $timestamps = true;

	public static $accessible = array('f_name', 'l_name', 'm_name', 'address1', 'address2', 'mobile', 'landline_home', 'landline_work', 'email', 'birthdate', 'gender', 'marital_status', 'smoker', 'drinker', 'blood_type');

	protected $rules = array(
			'f_name' => 'required|min:2',
			'l_name' => 'required|min:2',
			'email' => 'email',
		);

	public function history()
	{
		return $this->has_many('PatientHistory');
	}

	public static function fullName($patient_id)
	{
		$thiss = new Patient();
		return $thiss->find($patient_id)->f_name.' '.$thiss->find($patient_id)->l_name;
	}

}