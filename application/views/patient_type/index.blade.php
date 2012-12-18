@layout('layouts.main')

@section('content')

	<div id="middle-bar-small"> 
		Patient Types 
		<span class="pull-right btn-bar">
			<a href="{{ action('patienttype.create') }}" class="btn btn-mini">New Patient Type</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Patient Tpe</th><th>Notes</th><th>Created At</th><th>Updated At</th></tr>
	</thead>
	<tbody>
		@forelse($patient_types as $type)
		<tr>
			<td>{{ $type->patient_type }}</td>
			<td>{{ $type->notes }}</td>
			<td>{{ $type->created_at }}</td>
			<td>{{ $type->updated_at }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="4">0 patient type found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
