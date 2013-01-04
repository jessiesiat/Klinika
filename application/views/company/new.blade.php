@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('appointment') }}">Company</a> <span class="divider">/</span></li>
	@if(isset($company))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')
	
	@if(isset($company))

	<div id="middle-bar-small">Update Appointment</div>
	{{ Form::open(action('appointment.reSchedule'), 'POST', array('class' => 'form-horizontal')) }}
		<div class="control-group {{ $errors->has('patient') ? 'error' : '' }}">
			{{ Form::label('patient', 'Patient', array('class' => 'control-label')) }}
			<div class="controls">
			    {{ Form::text('patient', $appointment->patient->f_name.' '.$appointment->patient->l_name, array('readonly')) }}
			    {{ Form::hidden('patient_id', $appointment->patient->id) }}
			    {{ Form::hidden('appointment_id', $appointment->id) }}
			<span class="help-inline">{{ $errors->first('patient') }}</span>
			</div>
		</div>
		<?php $date = new Datetime($appointment->date_time); ?>
		<div class="control-group {{ $errors->has('date') ? 'error' : '' }}">
			{{ Form::label('date', 'Date and Time', array('class' => 'control-label')) }}
			<div class="form-inline controls">
				{{ Form::text('date', $date->format('Y-m-d'), array('placeholder' => 'yyyy-mm-dd', 'id' => 'datepicker')) }}
				<div class="input-append bootstrap-timepicker-component">
					<input type="text" value="{{ $date->format('h:i A') }}" name="apt_time" class="timepicker-default input-small">
					<span class="add-on">
					    <i class="icon-time"></i>
					</span>
				</div>
				<span class="help-inline">{{ $errors->first('date') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('reason_id') ? 'error' : '' }}">
			{{ Form::label('reason_id', 'Reason', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="reason_id">
					@foreach($apt_reasons as $apt_reason)
					<option value="{{ $apt_reason->id }}" {{ ($appointment->reason_id == $apt_reason->id) ? 'selected' : '' }} >{{ $apt_reason->reason }}</option>
					@endforeach
				</select>
				<span class="help-inline">{{ $errors->first('reason_id') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('notes') ? 'error' : '' }}">
			{{ Form::label('notes', 'Notes', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('notes', $appointment->notes, array('rows' => 3)) }}
				<span class="help-inline">{{ $errors->first('notes') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Update Appointment', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('appointment') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

	@else

	<div id="middle-bar-small">New Company</div>
	{{ Form::open(action('company.new'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('company_name') ? 'error' : '' }}">
			{{ Form::label('company_name', 'Company Name', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('company_name') }}
				<span class="help-inline">{{ $errors->first('company_name') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('contact_person') ? 'error' : '' }}">
			{{ Form::label('contact_person', 'Contact Person', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('contact_person') }}
				<span class="help-inline">{{ $errors->first('contact_person') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('type') ? 'error' : '' }}">
			{{ Form::label('type', 'Type', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('type') }}
				<span class="help-inline">{{ $errors->first('type') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('address1') ? 'error' : '' }}">
			{{ Form::label('address1', 'Address1', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('address1') }}
				<span class="help-inline">{{ $errors->first('address1') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('address2') ? 'error' : '' }}">
			{{ Form::label('address2', 'Address2', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('address2') }}
				<span class="help-inline">{{ $errors->first('address2') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('phone_no') ? 'error' : '' }}">
			{{ Form::label('phone_no', 'Phone Number', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('phone_no') }}
				<span class="help-inline">{{ $errors->first('phone_no') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('fax_no') ? 'error' : '' }}">
			{{ Form::label('fax_no', 'Fax Number', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('fax_no') }}
				<span class="help-inline">{{ $errors->first('fax_no') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('web_page') ? 'error' : '' }}">
			{{ Form::label('web_page', 'Web Page', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('web_page') }}
				<span class="help-inline">{{ $errors->first('web_page') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('comment') ? 'error' : '' }}">
			{{ Form::label('comment', 'Comment', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('comment', '', array('rows' => 3)) }}
				<span class="help-inline">{{ $errors->first('comment') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Company', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('company') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

	@endif

@endsection
