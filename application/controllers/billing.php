<?php

class Billing_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}

	public function get_index()
	{
		$for_billing = PatientHistory::with('patient')->where('is_billed', '=', 0)->get();

		return View::make('billing.index')->with('for_billing', $for_billing);
	}

	public function get_details($phistory_id)
	{
		$phistory = PatientHistory::with('patient')->find($phistory_id);
		$medications = PatientHistory::find($phistory_id)->medications;
		$billing_details = ItemPayable::where('from_trans_id', '=', $phistory_id)->first();

		return View::make('billing.details')
					->with('phistory', $phistory)
					->with('billing_details', $billing_details)
					->with('medications', $medications);
	}

	public function post_payment()
	{
		$phistory_id = Input::get('phistory_id');
		$itempayable_id = Input::get('itempayable_id');

		if(isset($phistory_id))
		{
			//Save amount paid
			$itempayable = ItemPayable::find($itempayable_id);
			if(Input::get('amount_paid') > 0)
			{
				$itempayable->amount_paid = $itempayable->amount_paid + Input::get('amount_paid');
				$itempayable->save();

				if($itempayable->amount_paid >= $itempayable->amount_due)
				{
					//Make the transaction as billed boolean TRUE
					$phistory = PatientHistory::find($phistory_id);
					$phistory->is_billed = TRUE;
					$phistory->bill_out = new \Datetime; 
					$phistory->save();

					//Post to MedicineOut when paid
					$medicine_out = Event::fire('medicine.out', array($phistory_id));

					if($medicine_out) return Redirect::to_action('billing')->with('success', 'Transaction paid');
				}

				return Redirect::to_action('billing.details', array($phistory_id))
								->with('success', 'Succesfully added payment.');
			}		
			else
			{
				return Redirect::to_action('billing.details', array($phistory_id))
								->with('error', 'Amount must be greater than zero.');				
			}	
		}

		return Response::error('500');
	}

}