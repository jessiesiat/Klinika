@layout('layouts.main')

@section('content')

	<div id="middle-bar-small"> 
		Services 
		<span class="pull-right btn-bar">
			<a href="{{ action('service.create') }}" class="btn btn-mini">New Service</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Service Name</th><th>Description</th><th>Cost</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($services as $service)
		<tr>
			<td>{{ $service->service_name }}</td>
			<td>{{ $service->description }}</td>
			<td>{{ $service->cost }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="6">0 service found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
