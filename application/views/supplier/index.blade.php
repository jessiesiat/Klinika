@layout('layouts.main')

@section('content')
	
	<div id="middle-bar-small">
        Suppliers 
        <span class="pull-right btn-bar">
            <a href="{{ action('supplier@new') }}" class="btn btn-mini">New Supplier</a>
        </span> 
    </div>

    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Name</td><th>Address</th><th>Contact No.</th><th>Contact Person</th><th></th>
        	</tr>
        </thead>
        <tbody>
        	@forelse($suppliers as $supplier)
        	<tr>
        		<td>{{ $supplier->supplier_name }}</td>
        		<td>{{ $supplier->address }}</td>
        		<td>{{ $supplier->contact_number }}</td>
        		<td>{{ $supplier->contact_person }}</td>
        		<td><a href="{{ action('supplier@edit', array($supplier->id)) }}" alt="edit"><i class="icon-edit"></i></a></td>
        	</tr>
            @empty
            <tr>
                <td colspan="5">No supplier created yet.</td>
            </tr>
        	@endforelse
        </tbody>
    </table>
	
@endsection