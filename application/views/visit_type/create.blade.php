@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('visittype') }}">Visit Type</a> <span class="divider">/</span></li>
	@if(isset($visit_type))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')
	
	@if(isset($visit_type))

	<div id="middle-bar-small">Update Visit Type</div>

	@else

	<div id="middle-bar-small">New Visit Type</div>
	{{ Form::open(action('visittype.create'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('visit_type') ? 'error' : '' }}">
			{{ Form::label('visit_type', 'Visit Type', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('visit_type') }}
				<span class="help-inline">{{ $errors->first('visit_type') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('notes') ? 'error' : '' }}">
			{{ Form::label('notes', 'Notes', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('notes', '', ['rows' => 3]) }}
				<span class="help-inline">{{ $errors->first('notes') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Visit Type', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('visittype') }}" class="btn">Cancel</a>
			</div>
		</div>
		
	{{ Form::close() }}

	@endif

@endsection
