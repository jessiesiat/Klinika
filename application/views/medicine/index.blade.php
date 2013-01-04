@layout('layouts.main')

@section('breadcrumb')
    @parent
    <li class="active">Medicine</li>
@endsection

@section('content')

    <div id="middle-bar-small">
        Medicines 
        <span class="pull-right btn-bar">
            <a href="{{ action('medicine@new') }}" class="btn btn-mini">New Medicine</a>
        </span>
    </div>

    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Medicine Name</td><th>Type</th><th>Selling Price</th><th>Description</th><th>On Hand</th><th></th>
        	</tr>
        </thead>
        <tbody>
        	@forelse($medicines as $medicine)
        	<tr>
        		<td>{{ $medicine->medicine_name }}</td>
        		<td>{{ ($medicine->type == 0) ? 'generic' : 'branded' }}</td>
        		<td>{{ $medicine->selling_price }}</td>
        		<td>{{ $medicine->desc }}</td>
                <td>{{ $medicine->on_hand }}</td>
        		<td>
                    <a href="{{ action('medicine.edit', array($medicine->id)) }}" alt="edit" title="edit"><i class="icon-edit"></i></a>
                    <a href="{{ action('medicine.add', array($medicine->id)) }}" alt="add stock" title="add stock"><i class="icon-plus"></i></a>
                </td>
        	</tr>
        	@empty
        	<tr>
        		<td colspan="5">No drug created yet.</td>
        	</tr>
        	@endforelse
        </tbody>
    </table>
	
@endsection