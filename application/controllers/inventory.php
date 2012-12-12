<?php

class Inventory_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$medicines = Medicine::get();

		return View::make('inventory.index')
					->with('medicines', $medicines);
	}

}