<?php

class Patient_Controller extends Base_Controller {
	
	public $restful = true;

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
	}
	public function get_index()
	{
		$patients = Patient::get();
		return View::make('patient.index')->with('patients', $patients);
	}

	public function get_new()
	{
		return View::make('patient.new');
	}

	public function post_search()
	{
		$query = Input::get('searchquery');
		$queryResult = Patient::where('f_name', 'like', '%'.$query.'%')
									->or_where('l_name', 'like', '%'.$query.'%')
									->take(20)
									->get();
									
		Input::flash('only', array('searchquery'));
		return View::make('patient.search')
					->with('queryResult', $queryResult);
	}

	public function post_new()
	{
		$patient = new Patient();

		if($patient->validate(Input::get()))
		{
			$newpatient = $patient->fill(Input::get());
			$newpatient->save();

			return Redirect::to_action('patient.details', array($newpatient->id))->with('success', 'Successfuly added patient.');
		}

		return Redirect::to('patient/new')->with_errors($patient->errors())->with_input();
	}

	public function get_section($await_id)
	{
        $pawaits = PatientAwait::with(array('patient', 'appointment'))->find($await_id);
        $medicines = Medicine::get();
        $services = Service::get();
        
		return View::make('patient.section')
					->with('pawaits', $pawaits)
					->with('services', $services)
					->with('medicines', $medicines);
	}

	public function post_section()
	{
		$phistory = new PatientHistory();

		if($phistory->validate(Input::get()))
		{
			$newphistory = $phistory->fill(Input::get());
			$newphistory->save();

			//Get array of medicines
			$medicine_id = Input::get('medicine_id');
			$uom = Input::get('uom');
			$qty = Input::get('qty');

			$medication = array();
			foreach($medicine_id as $key => $val)
			{
				$medication[] = array(
					'phistory_id' => $newphistory->id,
					'medicine_id' => $val,
					'uom' => $uom[$key],
					'qty' => $qty[$key],
					);
			}
			PatientHistoryMedication::insert($medication);

			//Fire posted item for billing
			$service_billing = Event::fire('service.billing', array($newphistory->id));

			//remove tag patient awaits from the table...
			DB::table('hc_patients_awaits')->delete(Input::get('await_id'));

			return Redirect::to('/')->with('success', 'Successfuly save patient record.');
		}

        $await_id = Input::get('await_id');
		return Redirect::to_action('patient@section', array($await_id))
						->with_input()
						->with('errors',  $phistory->errors());	
	}

	public function get_details($patient_id)
	{
		$pdetails = Patient::with(['history', 'doctorOrders'])->find($patient_id);
		$services = Service::get();

		return View::make('patient.details')
					->with('services', $services)
					->with('pdetails', $pdetails);
	}

	public function get_msearch()
	{
		return View::make('patient.msearch');
		//$name = Input::get('patient_name');
		//$data = HcUser::where('name', 'LIKE', '%'.$name.'%');

		//return json_encode($data);
	}

	public function get_edit($patient_id)
	{
		$patient = Patient::find($patient_id);

		return View::make('patient.edit')->with('patient', $patient);
	}

	public function post_edit()
	{
		$patient = Patient::find(Input::get('patient_id'));

		$patient->f_name = Input::get('f_name');
		$patient->email = Input::get('email');
		$patient->mobile = Input::get('mobile');
		$patient->landline_home = Input::get('landline_home');
		$patient->marital_status = Input::get('marital_status');
		$patient->address1 = Input::get('address1');
		$patient->address2 = Input::get('address2');
		$patient->smoker = Input::get('smoker');
		$patient->drinker = Input::get('drinker');
		$patient->blood_type = Input::get('blood_type');
		$patient->save();

		return Redirect::to_action('patient.details', array($patient->id))->with('success', 'Successfully save patient details');
	}

	public function post_image()
	{
		$rules = array(
            'picture' => 'image',
        );
        $validation = Validator::make(Input::file('patient_image'), $rules);

		if($validation->passes())
		{
			$filename = Input::get('f_name').Input::get('patient_id').'.'.File::extension(Input::file('patient_image.name'));
			$patient = Patient::find(Input::get('patient_id'));
			$patient->picture = $filename;
			$patient->save();
			
		    Input::upload('patient_image', 'public/uploads/patients_image', $filename);

		    return Redirect::to_action('patient.details', array(Input::get('patient_id')))
		    					->with('success', 'Successfully added image.');
		}

		return Redirect::to_action('patient.details', array(Input::get('patient_id')))
						->with_errors($validation->errors);
	}

	public function get_history($patient_id)
	{
		$phistory = PatientHistory::where('patient_id', '=', $patient_id)->order_by('created_at', 'desc')->get();
		$patient = Patient::find($patient_id);

		return View::make('patient.history')
					->with('patient', $patient)
					->with('phistory', $phistory);
	}

	public function post_checkup()
	{
		$pawaits = new PatientAwait();
		if($pawaits->validate(Input::get()))
		{
			$pawaits->fill(array(
				'patient_id' => Input::get('patient_id'),
				'service_id' => Input::get('service_id'),
				'complaint' => Input::get('complaint'),
				'time_in' => new \Datetime,
				));
			$pawaits->save();

			return Redirect::to_action('patient.details', array(Input::get('patient_id')))
							 ->with('success', 'Patient queue for checkup.');
		}

		return Redirect::to_action('patient.details', array(Input::get('patient_id')))
						->with('errors', $pawaits->errors());
	}

}