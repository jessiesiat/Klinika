<?php

class DoctorOrder_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function post_create()
	{
		$d_order = new DoctorOrder();

		if($d_order->validate(Input::get()))
		{
			$d_order->fill(Input::get());
			$d_order->save();

			return Redirect::to_action('patient.details', [Input::get('patient_id')])
							->with('success', 'Successfully added doctor order');
		}

		return Redirect::to_action('patient.details', [Input::get('patient_id')])
						->with('errors', $d_order->errors());
						
	}

}