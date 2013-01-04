@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('service') }}">Service</a> <span class="divider">/</span></li>
	@if(isset($service))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')
	
	@if(isset($service))

	<div id="middle-bar-small">Update Service</div>

	@else

	<div id="middle-bar-small">New Service</div>
	{{ Form::open(action('service.create'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('service_name') ? 'error' : '' }}">
			{{ Form::label('service_name', 'Service Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('service_name') }}
				<span class="help-inline">{{ $errors->first('service_name') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('description') ? 'error' : '' }}">
			{{ Form::label('description', 'Description', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('description', '', ['rows' => 3]) }}
				<span class="help-inline">{{ $errors->first('description') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('cost') ? 'error' : '' }}">
			{{ Form::label('cost', 'Cost', array('class' => 'control-label')) }}
			<div class="controls">
				<div class="input-prepend">
				<span class="add-on">PHP</span>
				{{ Form::text('cost', '', ['class' => 'input-append']) }}
				</div>
				<span class="help-inline">{{ $errors->first('cost') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Service', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('service') }}" class="btn">Cancel</a>
			</div>
		</div>
		
	{{ Form::close() }}

	@endif

@endsection
