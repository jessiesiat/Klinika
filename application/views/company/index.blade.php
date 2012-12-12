@layout('layouts.main')

@section('content')

	<div id="middle-bar-small"> 
		Company 
		<span class="pull-right btn-bar">
			<a href="{{ action('company.new') }}" class="btn btn-mini">New Company</a>
		</span>
	</div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Name</th><th>Contact Person</th><th>Phone Number</th><th>Fax Number</th><th>Web Page</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($company as $company)
		<tr>
			<td>{{ $company->company_name }}</td>
			<td>{{ $company->contact_person }}</td>
			<td>{{ $company->phone_no }}</td>
			<td>{{ $company->fax_no }}</td>
			<td>{{ $company->comment }}</td>
			<td></td>
		</tr>
		@empty
		<tr><td colspan="6">0 company found</td></tr>
		@endforelse
	</tbody>
	</table>

@endsection
