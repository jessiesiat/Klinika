@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li class="active">Doctor and Staff</li>
@endsection

@section('content')

	<div id="middle-bar-small"> 
		Doctor and Staff 
		<span class="pull-right btn-bar">
			<a href="{{ action('doctorstaff.create') }}" class="btn btn-mini">New Doctor/Staff</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Name</th><th>Address</th><th>Email</th><th>Mobile</th><th>Notes</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($doctor_staff as $dstaff)
		<tr>
			<td>{{ $dstaff->f_name }}</td>
			<td>{{ $dstaff->address }}</td>
			<td>{{ $dstaff->email }}</td>
			<td>{{ $dstaff->mobile }}</td>
			<td>{{ $dstaff->notes }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="6">0 doctor or staff found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
