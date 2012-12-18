<?php

class PatientType_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$patient_types = PatientType::get();

		return View::make('patient_type.index')
					->with('patient_types', $patient_types);
	}

	public function get_create()
	{
		return View::make('patient_type.create');
	}

	public function post_create()
	{
		$ptype = new PatientType();

		if($ptype->validate(Input::get()))
		{
			$ptype->fill(Input::get());
			$ptype->save();

			return Redirect::to_action('patienttype')
							->with('success', 'Successfully save patient type');
		}

		return Redirect::to_action('patienttype.create')
						->with('errors', $ptype->errors())
						->with_input();
	}

}