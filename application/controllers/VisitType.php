<?php

class VisitType_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$visit_types = VisitType::get();

		return View::make('visit_type.index')
					->with('visit_types', $visit_types);
	}

	public function get_create()
	{
		return View::make('visit_type.create');
	}

	public function post_create()
	{
		$vtype = new VisitType();

		if($vtype->validate(Input::get()))
		{
			$vtype->fill(Input::get());
			$vtype->save();

			return Redirect::to_action('visittype')
							->with('success', 'Successfully save patient type');
		}

		return Redirect::to_action('visittype.create')
						->with('errors', $vtype->errors())
						->with_input();
	}

}