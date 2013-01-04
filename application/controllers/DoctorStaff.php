<?php

class DoctorStaff_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$doctor_staff = DoctorStaff::get();

		return View::make('doctor_staff.index')
					->with('doctor_staff', $doctor_staff);
	}

	public function get_create()
	{
		return View::make('doctor_staff.create');
	}

	public function post_create()
	{
		$dstaff = new DoctorStaff();

		if($dstaff->validate(Input::get()))
		{
			$dstaff->fill(Input::get());
			$dstaff->save();

			return Redirect::to_action('doctorstaff')
							->with('success', 'Successfully create doctor or staff');
		}

		return Redirect::to_action('doctorstaff.create')
						->with_input()
						->with('errors', $dstaff->errors());
	}

}