<?php

class PatientHistoryMedication extends Elegant {
	
	public static $table = 'hc_patient_history_medications';

	public static $timestamps = false;

	public static function medicationBilling($phistory_id)
	{
		$medication = PatientHistoryMedication::where('phistory_id', '=', $phistory_id)->get();
		$medication_amt = 0;
		foreach($medication as $medication)
		{
			$medication_amt += ((Medicine::find($medication->medicine_id)->selling_price) * $medication->qty);
		}

		$service_id = PatientHistory::find($phistory_id)->service_id;

		$total_amt = $medication_amt + (Service::find($service_id)->cost);

		return $total_amt;
	}

}