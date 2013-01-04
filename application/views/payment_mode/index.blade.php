@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li class="active">Payment Mode</li>
@endsection

@section('content')

	<div id="middle-bar-small"> 
		Payment Modes
		<span class="pull-right btn-bar">
			<a href="{{ action('paymentmode.create') }}" class="btn btn-mini">New Payment Mode</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Payment Mode</th><th>Notes</th><th>Created At</th><th>Updated At</th></tr>
	</thead>
	<tbody>
		@forelse($payment_modes as $pmode)
		<tr>
			<td>{{ $pmode->payment_mode }}</td>
			<td>{{ $pmode->notes }}</td>
			<td>{{ $pmode->created_at }}</td>
			<td>{{ $pmode->updated_at }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="4">0 payment mode found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
