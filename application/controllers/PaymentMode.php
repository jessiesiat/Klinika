<?php

class PaymentMode_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$payment_modes = PaymentMode::get();

		return View::make('payment_mode.index')
					->with('payment_modes', $payment_modes);
	}

	public function get_create()
	{
		return View::make('payment_mode.create');
	}

	public function post_create()
	{
		$pmode = new PaymentMode();

		if($pmode->validate(Input::get()))
		{
			$pmode->fill(Input::get());
			$pmode->save();

			return Redirect::to_action('paymentmode')
							->with('success', 'Successfully save patient type');
		}

		return Redirect::to_action('paymentmode.create')
						->with('errors', $pmode->errors())
						->with_input();
	}

}