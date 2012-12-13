@layout('layouts.main')

@section('content')

<div id="print_section">
	<div id="middle-bar-small">
		Service Details for {{ $phistory->patient->f_name.' '.$phistory->patient->l_name }}
		<div class="pull-right" id="no_print"><a HREF="javascript:window.print()" alt="print" title="Print"><i class="icon-print"></i></a></div>
	</div>
	
	<p>Date and Time: {{ $phistory->date_time_in }}</p>
	<p>Complaint: {{ $phistory->complaint }}</p>
	<p>Diagnosis: {{ $phistory->diagnosis }}</p>
	<p>Procedure: {{ $phistory->procedure }}</p>
	<p>Physical Exam: {{ $phistory->physical_exam }}</p>
	<p>Result: {{ $phistory->result }}</p>
	<p>Medications:</p>
	<ul>
	@forelse($medications as $medication)
	<li>{{ Medicine::find($medication->medicine_id)->medicine_name.' - '.$medication->qty.' '.$medication->uom }}</li>
	@empty
	<li>No medications given</li>
	@endforelse
	</ul>

	<hr />
	<div class="span4 pull-right" id="no_print">
		@if($phistory->is_billed)
		<i>This item is paid.</i>
		@else
		{{ Form::open(action('billing.payment')) }}
			{{ Form::hidden('phistory_id', $phistory->id) }}
			{{ Form::hidden('itempayable_id', $billing_details->id) }}
			<p>Pay above item: {{ Form::text('amount_paid', '', array('class' => 'input-medium', 'placeholder' => 'Enter Amount')) }}</p>
			<p> {{ Form::submit('Submit Payment', array('class' => 'btn btn-primary')) }} </p>
		{{ Form::close() }}
		@endif
	</div>

	<h5>Amount Due: {{ $billing_details->amount_due }} </h5>
	<p>Amount Paid: {{ $billing_details->amount_paid }}</p>

</div>

@endsection
