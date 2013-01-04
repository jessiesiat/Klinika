@layout('layouts.main')

@section('breadcrumb')
    @parent
    <li class="active">Patients</li>
@endsection

@section('content')

    <div id="middle-bar-small">
        Patients<div class="pull-right btn-bar-small"><a href="{{ action('patient@new') }}" class="btn btn-mini">New Patient</a></div>
    </div>
    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Name</td><th>Address</th><th>Gender</th><th>Contact No.</th><th></th>
        	</tr>
        </thead>
        <tbody>
        	@foreach($patients as $patient)
        	<tr>
        		<td>{{ $patient->f_name.' '.$patient->l_name }}</td>
        		<td>{{ $patient->address1 }}</td>
        		<td>{{ $patient->gender }}</td>
        		<td>{{ $patient->mobile }}</td>
        		<td>
                    <span class="pull-right">
                    <a href="{{ action('patient.edit', array($patient->id)) }}" alt="edit" title="edit"><i class="icon-edit"></i></a>
                    <a href="{{ action('appointment.new', array($patient->id)) }}" title="new appointment">appointment</a>
                    <a href="{{ action('patient.details', array($patient->id)) }}" title="details">details</a>
                    </span>
                </td>
        	</tr>
        	@endforeach
        </tbody>
    </table>
	

@endsection