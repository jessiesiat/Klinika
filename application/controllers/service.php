<?php

class Service_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$services = Service::get();

		return View::make('service.index')
					->with('services', $services);
	}

	public function get_create()
	{
		return View::make('service.create');
	}

	public function post_create()
	{
		$service = new Service();

		if($service->validate(Input::get()))
		{
			$service->fill(Input::get());
			$service->save();

			return Redirect::to_action('service')
							->with('success', 'Successfully created service.');
		}

		return Redirect::to_action('service.create')
						->with_errors($service->errors())
						->with_input();
	}

}