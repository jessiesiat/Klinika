<?php

class PatientType extends Elegant {
	
	public static $table = 'ref_patient_types';

	protected $rules = array(
			'patient_type' => 'required',
		);

}