@layout('layouts.main')

@section('content')

    <h4><a href="{{ action('patient.details', array($patient->id)) }}">{{ Str::upper($patient->f_name.' '.$patient->l_name) }}</a> Medical History</h4>
    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Date and Time</th><th>Complaint</th><th>Diagnosis</th><th>Procedure</th><th>Prescription</th><th>Notes</th><th></th>
        	</tr>
        </thead>
        <tbody>
        	@forelse($phistory as $phistory)
        	<tr>
        		<td>{{ $phistory->date_time_in }}</td>
        		<td>{{ $phistory->complaint }}</td>
        		<td>{{ $phistory->diagnosis }}</td>
                <td>{{ $phistory->procedure }}</td>
                <td>{{ $phistory->prescription }}</td>
                <td>{{ $phistory->notes }}</td>
                <td>
                    <a href="{{ action('billing.details', array($phistory->id)) }}">details</a>
                </td>
        	</tr>
            @empty
            <tr>
                <td colspan="6">No medical history yet.</td>
            </tr>
        	@endforelse
        </tbody>
    </table>
	

@endsection