<?php

class PatientAwait_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
		$this->filter('before', 'csrf')->only(array('cancel'))->on('post');
	}

	public function post_cancel()
	{
		$await_id = Input::get('await_id');

		if($await_id)
		{
			PatientAwait::find($await_id)->delete();

			return Redirect::to('/')->with('success', 'Appointment is now cancelled');
		}

		return Response::error(500);
	}

}