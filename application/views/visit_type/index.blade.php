@layout('layouts.main')


@section('breadcrumb')
	@parent
	<li class="active">Visit Type</li>
@endsection


@section('content')

	<div id="middle-bar-small"> 
		Visit Types 
		<span class="pull-right btn-bar">
			<a href="{{ action('visittype.create') }}" class="btn btn-mini">New Visit Type</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Visit Type</th><th>Notes</th><th>Created At</th><th>Updated At</th></tr>
	</thead>
	<tbody>
		@forelse($visit_types as $type)
		<tr>
			<td>{{ $type->visit_type }}</td>
			<td>{{ $type->notes }}</td>
			<td>{{ $type->created_at }}</td>
			<td>{{ $type->updated_at }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="4">0 visit type found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
