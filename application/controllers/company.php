<?php

class Company_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$company = Company::get();

		return View::make('company.index')
					->with('company', $company);
	}

	public function get_new()
	{
		return View::make('company.new');
	}

	public function post_new()
	{
		$company = new Company();

		if($company->validate(Input::get()))
		{
			$company->fill(Input::get());
			$company->save();

			return Redirect::to_action('company')
							->with('success', 'Successfully created company');
		}

		return Redirect::to_action('company.new')
						->with_errors($company->errors())
						->with_input();
	}

}