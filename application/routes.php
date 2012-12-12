<?php

Route::controller(array('patient', 'medicine', 'appointment', 'supplier', 'patientawait', 'billing', 'inventory', 'user', 'company', 'service'));

//Experimenting wit backbone

Route::get('backbone', function()
{
	return View::make('backbone');
});

Route::post('user', function()
{
	$data = Input::get();
	$user = User::create($data);

	return json_encode($user->to_array());
});

//end of Experimenting wit backbone

Route::get('notes', function()
{
    return View::make('notes.dev');
});

Route::get('login', array('before' => 'nonauth', function()
{
	return View::make('login');
}));

Route::post('login', function()
{
	$credentials = array(
		  'username' => Input::get('username'),
		  'password' => Input::get('password')
		);
	
	if(Auth::attempt($credentials))
	{
		return Redirect::to('/');
	}

	return Redirect::to('login');

});

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('login');
});

Route::get('register', function()
{
	return View::make('register');
});

Route::post('register', function()
{
	$user = new HcUser();

	if($user->validate(Input::get()))
	{
        $data = array(
		  'name' => Input::get('name'),
		  'email' => Input::get('email'),
		  'username' => Input::get('username'),
		  'password' => Hash::make(Input::get('password'))
	    );
	    HcUser::create($data);
	    return Redirect::to('register')->with('success', 'Successfuly registered!');
	}

	return Redirect::to('register')->with_errors($user->errors())->with_input();
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/', function()
	{
		$patients_awaits = PatientAwait::with('patient')->get();
		$for_billing = PatientHistory::where('is_billed', '=', FALSE)->get();

		return View::make('home.index')
					->with('patients_awaits', $patients_awaits)
					->with('for_billing', $for_billing);
	});

});

/*
|--------------------------------------------------------------------------
| Events listeners
|--------------------------------------------------------------------------
*/

//Post billing payable for the patient from the Patient History table
Event::listen('service.billing', function($phistory_id)
{
	$amount_due = PatientHistoryMedication::medicationBilling($phistory_id);
	$payable = ItemPayable::create(array(
						'from_trans' => 'PatientHistory',
						'from_trans_id' => $phistory_id,
						'amount_due' => $amount_due,
						'amount_paid' => 0,
						));
	return $payable;
});

//Post to MedicineOut, when patient billing id paid full and includes medications 
Event::listen('medicine.out', function($phistory_id)
{
	$phistorymed = PatientHistoryMedication::where('phistory_id', '=', $phistory_id)->get();

	$medications = array();
	foreach($phistorymed as $phistorymed)
	{
		$medications[] = array(
					'from_trans' => 'PatientHistoryMedication',
					'from_trans_id' => $phistorymed->id,
					'medicine_id' => $phistorymed->medicine_id,
					'qty' => $phistorymed->qty,
					'uom' => $phistorymed->uom,
					);
		//Update the medicine 'on_hand' lessen
		$stock_out = Event::fire('medicinestock.out', array($phistorymed->medicine_id, $phistorymed->qty));
	}

	$medicine_out =	MedicineOut::insert($medications);

	return $medicine_out;
});

//Update the Medicine 'on_hand' field for the added stock. 
Event::listen('medicinestock.in', function($medicine_id, $qty)
{
	$medicine = Medicine::find($medicine_id);
	$medicine->on_hand = $medicine->on_hand + $qty;
	$medicine->save();

	return TRUE; 
});

Event::listen('medicinestock.out', function($medicine_id, $qty)
{
	$medicine = Medicine::find($medicine_id);
	$medicine->on_hand = $medicine->on_hand - $qty;
	$medicine->save();

	return TRUE; 
});


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});

Route::filter('nonauth', function()
{
	if (Auth::check()) return Redirect::to('/');
});

// ===========================================================
	// Clinic Guide
// ===========================================================

/**
 * Load the Markdown library.
 */
//require_once __DIR__.'/libraries/markdown.php';

/**
 * Get the root path for the documentation Markdown.
 *
 * @return string
 */
function guide_root()
{
	return __DIR__.'/userguide/';
}

/**
 * Get the parsed Markdown contents of a given page.
 *
 * @param  string  $page
 * @return string
 */
function parseDocument($page)
{
	return Markdown(file_get_contents(guide_root().$page.'.md'));
}

/**
 * Determine if a documentation page exists.
 *
 * @param  string  $page
 * @return bool
 */
function guideExist($page)
{
	return file_exists(guide_root().$page.'.md');
}

/**
 * Handle the documentation homepage.
 *
 * This page contains the "introduction" to Laravel.
 */
Route::get('userguide', function()
{
	return View::make('userguide')->with('content', parseDocument('index'));
});

/**
 * Handle documentation routes for sections and pages.
 *
 * @param  string  $section
 * @param  string  $page
 * @return mixed
 */
Route::get('userguide/(:any)/(:any?)', function($section, $page = null)
{
	$file = rtrim(implode('/', func_get_args()), '/');

	// If no page was specified, but a "home" page exists for the section,
	// we'll set the file to the home page so that the proper page is
	// displayed back out to the client for the requested doc page.
	if (is_null($page) and guideExist($file.'/home'))
	{
		$file .= '/home';
	}

	if (guideExist($file))
	{
		return View::make('userguide')->with('content', parseDocument($file));
	}
	else
	{
		return Response::error('404');
	}
});