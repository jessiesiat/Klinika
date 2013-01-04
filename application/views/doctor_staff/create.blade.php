@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('doctorstaff') }}">Doctor and Staff</a> <span class="divider">/</span></li>
	@if(isset($company))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')
	
	@if(isset($dstaff))

	<div id="middle-bar-small">Update Doctor/Staff</div>
	{{ Form::open(action(''), 'POST', array('class' => 'form-horizontal')) }}
		Edit doctor / staff.
	{{ Form::close() }}

	@else

	<div id="middle-bar-small">New Doctor/Staff</div>
	{{ Form::open(action('doctorstaff.create'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('f_name') ? 'error' : '' }}">
			{{ Form::label('f_name', 'Full Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('f_name', Input::old('f_name')) }} &nbsp;&nbsp;
				<select name="is_doctor" class="input-small">
				   <option value="0">Staff</option>
				   <option value="1">Doctor</option>
			    </select> 
				<span class="help-inline">{{ $errors->first('f_name') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
			{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('email', Input::old('email')) }}
				<span class="help-inline">{{ $errors->first('email') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('birthdate') ? 'error' : '' }}">
			{{ Form::label('birthdate', 'Birthdate (yyyy-mm-dd)', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('birthdate', Input::old('birthdate'), ['placeholder' => 'yyyy-mm-dd', 'class' => '']) }}
				<span class="help-inline">{{ $errors->first('birthdate') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('mobile') ? 'error' : '' }}">
			{{ Form::label('mobile', 'Mobile', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('mobile', Input::old('mobile')) }}
				<span class="help-inline">{{ $errors->first('mobile') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('landline_home') ? 'error' : '' }}">
			{{ Form::label('landline_home', 'Landline Home', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('landline_home', Input::old('landline_home')) }}
				<span class="help-inline">{{ $errors->first('landline_home') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('address') ? 'error' : '' }}">
			{{ Form::label('address', 'Address', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('address', Input::old('address')) }}
				<span class="help-inline">{{ $errors->first('address') }}</span>
			</div>
		</div>
		
		<div class="control-group {{ $errors->has('notes') ? 'error' : '' }}">
			{{ Form::label('notes', 'Notes', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('notes', Input::old('notes'), array('rows' => 3)) }}
				<span class="help-inline">{{ $errors->first('notes') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Doctor/Staff', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('doctorstaff') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

	@endif

@endsection
