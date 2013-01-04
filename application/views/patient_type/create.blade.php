@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('patienttype') }}">Patient Type</a> <span class="divider">/</span></li>
	<li class="active">New</li>
@endsection

@section('content')
	
	@if(isset($patient_type))

	<div id="middle-bar-small">Update Patient Type</div>

	@else

	<div id="middle-bar-small">New Patient Type</div>
	{{ Form::open(action('patienttype.create'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('patient_type') ? 'error' : '' }}">
			{{ Form::label('patient_type', 'Patient Type', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('patient_type') }}
				<span class="help-inline">{{ $errors->first('patient_type') }}</span>
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
				{{ Form::submit('Save Patient Type', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('patienttype') }}" class="btn">Cancel</a>
			</div>
		</div>
		
	{{ Form::close() }}

	@endif

@endsection
