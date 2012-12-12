<?php

class Supplier_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$suppliers = Supplier::get();
		return View::make('supplier.index')
						->with('suppliers', $suppliers);
	}

	public function get_new()
	{
		return View::make('supplier.new');
	}

	public function post_new()
	{
		$supplier = new Supplier();

		if($supplier->validate(Input::get()))
		{
            $newsupplier = $supplier->fill(Input::get());
            $newsupplier->save();

            return Redirect::to_action('supplier')->with('success', 'Successfully save supplier data');
		}

		return Redirect::to_action('supplier@new')
							->with_input()
							->with('errors', $supplier->errors());
	}

	public function get_edit($id)
	{
		$supplier = Supplier::find($id);

        return View::make('supplier.new')->with('supplier', $supplier);
	}

	public function post_edit()
	{
		$id = Input::get('supplier_id');
		$supplier = Supplier::find($id);

        $supplier->supplier_name = Input::get('supplier_name');
        $supplier->address = Input::get('address');
        $supplier->email = Input::get('email');
        $supplier->contact_person = Input::get('contact_person');
        $supplier->contact_number = Input::get('contact_number');

        $supplier->save();

        return Redirect::to_action('supplier')->with('success', 'Successfully save supplier data');
		}

}