@layout('layouts.main')

@section('content')

	<div id="middle-bar-small">Items for Billing:</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Patient</th><th>Service</th><th>Date and Time</th><th>Prescription</th><th>Amount</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($for_billing as $for_billing)
		<tr>
			<td>{{ $for_billing->patient->f_name.' '.$for_billing->patient->l_name }}</td>
			<td>{{ Service::find($for_billing->service_id)->service }}</td>
			<td>{{ $for_billing->date_time_in }}</td>
			<td>{{ $for_billing->prescription }}</td>
			<td>{{ ItemPayable::where('from_trans_id', '=', $for_billing->id)->first()->amount_due }}</td>
			<td><a href="{{ action('billing.details', array($for_billing->id)) }}" class="btn btn-mini btn-primary">details</a></td>
		</tr>
		@empty
		<tr><td colspan="6"><i>0 found</i></td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
