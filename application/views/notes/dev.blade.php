@layout('layouts.main')

@section('content')
	<h3>Patient Appointment</h3>
	<ul>
		<li>Doctor's staff will schedule an appointment for the patient.</li>
		<li>By the time patient came in on the specified date, staff can now mark it as patient awaiting.</li>
	</ul>
	<h3>New Patient</h3>
	<ul>
		<li>Patient goes directly to the staff counter for booking with the doctor.</li>
		<li>Staff then enters the patient record. For this new ticket will be created.</li>
		<li>For Patient with a record already, staff can immediately create a ticket for them.</li>
	</ul>
	<h3>Doctor's Dashboard - Awaiting Patient</h3>
	<ul>
		<li>All patients with ticket awaiting will be listed in the doctors dashboard of awaiting patient.</li>
	</ul>
@endsection
