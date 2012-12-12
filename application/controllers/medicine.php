<?php

class Medicine_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$medicines = Medicine::get();
		return View::make('medicine.index')->with('medicines', $medicines);
	}

	public function get_new()
	{
		$suppliers = Supplier::get();

		return View::make('medicine.new')
					->with('suppliers', $suppliers);
	}

	public function post_new()
	{
		$medicine = new Medicine();

		if($medicine->validate(Input::get()))
		{
			$medicine->fill(Input::get());
			$medicine->save();

			return Redirect::to_action('medicine')
							->with('success', 'Successfully added medicine.');
		}

		return Redirect::to_action('medicine@new')
		                ->with_input()
						->with('errors', $medicine->errors());
	}

	public function get_edit($id)
	{
		$medicine = Medicine::find($id);
		$suppliers = Supplier::get();

		return View::make('medicine.new')
					->with('medicine', $medicine)
					->with('suppliers', $suppliers);
	}

	public function post_edit()
	{
		$medicine = Medicine::find(Input::get('medicine_id'));

		$medicine->selling_price = Input::get('selling_price');
		$medicine->type = Input::get('type');
		$medicine->desc = Input::get('desc');

		$medicine->save();

		return Redirect::to_action('medicine')->with('success', 'Successfully save medicine data');
	}

	//Add stock for specified medicine
	public function get_add($medicine_id)
	{
		$medicine = Medicine::find($medicine_id);

		if($medicine)
		{
			$suppliers = Supplier::get();
			$date = new \Datetime;
			return View::make('medicine.add')
					->with('suppliers', $suppliers)
					->with('date_today', $date)
					->with('medicine', $medicine);	
		}

		return Response::error('500');
	}

	//Post stock for specified medicine
	public function post_add()
	{
		$medicine_in = new MedicineIn();

		if($medicine_in->validate(Input::get()))
		{
			$medicine_in->fill(Input::get());
			$medicine_in->save();

			//Update the medicine 'on_hand'
			$stock_in = Event::fire('medicinestock.in', array(Input::get('medicine_id'), Input::get('qty')));

			return Redirect::to_action('medicine')
							->with('success', 'Successfully added stock for medicine');
		}

		return Redirect::to_action('medicine.add', array(Input::get('medicine_id')))
						->with('errors', $medicine_in->errors())
						->with_input();
	}

}