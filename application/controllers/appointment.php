<?php

class Appointment_Controller extends Base_Controller {
	
	public $restful = true; 

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'auth');
		$this->filter('before', 'csrf')->only(array('cancel'))->on('post');
	}

	public function get_index()
	{
		$appointments = Appointment::with('patient')->get();

		return View::make('appointment.index')
						->with('appointments', $appointments);
	}

	public function get_new($id = NULL)
	{
		$today = new \DateTime;
		$patient = $id ? Patient::find($id) : '';
		$appointment_reason = AppointmentReason::get();

		return View::make('appointment.new')
		             ->with('date_today', $today)
		             ->with('patient', $patient)
		             ->with('apt_reasons', $appointment_reason);
	}

	public function post_new()
	{
		$appointment = new Appointment();
		$rawdate = Input::get('date').' '.Input::get('apt_time');
		$datetime = \DateTime::createFromFormat('Y-m-d h:i A', $rawdate);
		$data = array(  
						'patient' => Input::get('patient'),
						'patient_id' => Input::get('patient_id'),
						'date' => Input::get('date'),
						'date_time' => $datetime,
						'reason_id' => Input::get('reason_id'),
						'notes' => Input::get('notes') 
					);

		if($appointment->validate($data))
		{
			$newappointment = $appointment->fill($data);
			$newappointment->save();

            return Redirect::to_action('appointment')
            					->with('success', 'Succesfully save appointment.');     					
		}

		return Redirect::to_action('appointment@new', array(Input::get('patient_id')))
						    ->with_errors($appointment->errors())
						    ->with_input();
	}

	public function get_isIn($appointment_id, $patient_name)
	{
		if($appointment_id)
		{
			$appointment = Appointment::find($appointment_id);

			PatientAwait::create(array(
					'patient_id' => $appointment->patient_id,
					'time_in' => new \DateTime,
					'is_appointment' => TRUE,
					'appointment_id' => $appointment_id,
				));

			//set status to 1(int) = is in 
			$appointment->status = 1;
			$appointment->save();

			return Redirect::to_action('appointment')->with('success', 'Patient '.$patient_name.' is in for an appointment.');
		}

		return Response::error('500');
	}

	public function get_reSchedule($appointment_id)
	{
		$appointment = Appointment::with('patient')->find($appointment_id);
		$appointment_reason = AppointmentReason::get();
		
		return View::make('appointment.new')
		            ->with('apt_reasons', $appointment_reason)
					->with('appointment', $appointment);
	}

	public function post_reSchedule()
	{
		$appointment_id = Input::get('appointment_id');

		if($appointment_id)
		{
			$appointment = Appointment::find(Input::get('appointment_id'));

			$rawdate = Input::get('date').' '.Input::get('apt_time');
			$datetime = \DateTime::createFromFormat('Y-m-d h:i A', $rawdate);
		
			$appointment->date_time = $datetime;
			$appointment->reason_id = Input::get('reason_id');
			$appointment->notes = Input::get('notes');
			$appointment->save();

			return Redirect::to('appointment')->with('success', 'Successfully updated appointment');	
		}

		return Response::error('500');
		
	}

	public function post_cancel()
	{
		$appointment_id = Input::get('appointment_id');

		if($appointment_id)
		{
			$appointment = Appointment::find($appointment_id);
			$appointment->status = 3;
			$appointment->save();

			PatientAwait::where('appointment_id', '=', $appointment_id)->delete();

			return Redirect::to('appointment')->with('success', 'Appointment is now cancelled');
		}

		return Response::error(500);
	}

}