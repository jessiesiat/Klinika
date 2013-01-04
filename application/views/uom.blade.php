@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('clinicinfo') }}">UOM</a> <span class="divider">/</span></li>
	<li class="active">Manage</li>
@endsection

@section('content')
	
	<div id="middle-bar-small">Unit of Measure</div>

	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>ID</th><th>UOM</th><th>Description</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($uom as $u)
		<tr>
			<td>{{ $u->id }}</td>
			<td>{{ $u->uom }}</td>
			<td>{{ $u->uom_desc }}</td>
			<td><a href="{{ url('uom/delete/'.$u->id) }}" title="delete"><i class="icon-trash"></i></a></td>
		</tr>
		@empty
		<tr><td colspan="6">0 uom found</td></tr>
		@endforelse
	</tbody>
	</table>

	<hr />
	<div id="middle-bar-small">New UOM</div>
	{{ Form::open('uom', 'POST', array('class' => 'form-horizontal')) }}

		<div class="control-group {{ $errors->has('uom') ? 'error' : '' }}">
			{{ Form::label('uom', 'UOM', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('uom') }}
				<span class="help-inline">{{ $errors->first('uom') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('uom_desc') ? 'error' : '' }}">
			{{ Form::label('uom_desc', 'Description', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('uom_desc') }}
				<span class="help-inline">{{ $errors->first('uom_desc') }}</span>
			</div>
		</div>
		
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save UOM', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('/') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

@endsection
	