@layout('layouts.main')

@section('content')

    <div id="middle-bar-small">Inventory</div>

    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Medicine Name</td><th>Type</th><th>Description</th><th>On Hand</th><th>UOM</th>
        	</tr>
        </thead>
        <tbody>
        	@forelse($medicines as $medicine)
        	<tr>
        		<td>{{ $medicine->medicine_name }}</td>
        		<td>{{ ($medicine->type == 0) ? 'generic' : 'branded' }}</td>
        		<td>{{ $medicine->desc }}</td>
                <td>{{ $medicine->on_hand }}</td>
                <td>tablet</td>
        	</tr>
        	@empty
        	<tr>
        		<td colspan="5">No inventory to show</td>
        	</tr>
        	@endforelse
        </tbody>
    </table>
	
@endsection