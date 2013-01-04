@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('clinicinfo') }}">Clinic Info</a> <span class="divider">/</span></li>
	<li class="active">Edit</li>
@endsection

@section('content')
	
	<div id="middle-bar-small">Update Clinic Info.</div>
	{{ Form::open('clinicinfo', 'POST', array('class' => 'form-horizontal')) }}

		<div class="control-group {{ $errors->has('clinic_name') ? 'error' : '' }}">
			{{ Form::label('clinic_name', 'Clinic Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('clinic_name', $clinic_info->clinic_name) }}
				<span class="help-inline">{{ $errors->first('clinic_name') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('clinic_address') ? 'error' : '' }}">
			{{ Form::label('clinic_address', 'Clinic Address', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('clinic_address', $clinic_info->clinic_address) }}
				<span class="help-inline">{{ $errors->first('clinic_address') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('clinic_email') ? 'error' : '' }}">
			{{ Form::label('clinic_email', 'Clinic Email', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('clinic_email', $clinic_info->clinic_email) }}
				<span class="help-inline">{{ $errors->first('clinic_email') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('clinic_dept') ? 'error' : '' }}">
			{{ Form::label('clinic_dept', 'Clinic Department', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('clinic_dept', $clinic_info->clinic_dept) }}
				<span class="help-inline">{{ $errors->first('clinic_dept') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('clinic_type') ? 'error' : '' }}">
			{{ Form::label('clinic_type', 'Clinic Type', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('clinic_type', $clinic_info->clinic_type) }}
				<span class="help-inline">{{ $errors->first('clinic_type') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Clinic Info', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('/') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

@endsection
	