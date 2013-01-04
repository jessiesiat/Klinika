@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('patient') }}">Patients</a> <span class="divider">/</span></li>
	<li class="active">Search</li>
@endsection

@section('content')

	<div id="middle-bar-small">Search Results:</div>

	<table class="table table-condensed table-striped">
		<thead>
			<tr><th>Patient Name</th><th>Gender</th><th>address</th><th>Phone</th><th>action</th></tr>
		</thead>
		<tbody>
		    @forelse($queryResult as $result)
			<tr>
		      <td>{{ $result->f_name.' '.$result->l_name }}</td>
		      <td>{{ $result->gender }}</td>
		      <td>{{ $result->address1 }}</td>
		      <td>{{ $result->mobile }}</td>
		      <td><a href="{{ action('patient.details', array($result->id)) }}">details</a></td>
		    </tr>
		    @empty
		    <tr>
		      <td colspan="5">No results found...</td>
		    </tr>
		    @endforelse
            
	    </tbody>
	</table>

@endsection