@layout('layouts.main')

@section('content')
	
	@if(isset($appointment))

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
				{{ Form::text('date', $date->format('Y-m-d'), array('placeholder' => 'yyyy-mm-dd', 'class' => 'datepicker hasDatepicker')) }}
				<div class="input-append bootstrap-timepicker-component">
					<input type="text" value="{{ $date->format('h:i A') }}" name="apt_time" class="timepicker-default input-small">
					<span class="add-on">
					    <i class="icon-time"></i>
					</span>
				</div>
				<span class="help-inline">{{ $errors->first('date') }}</span>
			</div>
		</div>
		<!--<div class="control-group {{ $errors->has('reason_id') ? 'error' : '' }}">
			{{ Form::label('reason_id', 'Reason', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="reason_id">
					@foreach($apt_reasons as $apt_reason)
					<option value="{{ $apt_reason->id }}" {{ ($appointment->reason_id == $apt_reason->id) ? 'selected' : '' }} >{{ $apt_reason->reason }}</option>
					@endforeach
				</select>
				<span class="help-inline">{{ $errors->first('reason_id') }}</span>
			</div>
		</div>-->
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

	<div id="middle-bar-small">New Appointment</div>
	{{ Form::open(action('appointment.new'), 'POST', array('class' => 'form-horizontal')) }}
		<div class="control-group {{ $errors->has('patient') ? 'error' : '' }}">
			{{ Form::label('patient', 'Patient', array('class' => 'control-label')) }}
			<div class="controls">
			@if($patient)
			    {{ Form::text('patient', $patient->f_name.' '.$patient->l_name, array('readonly')) }}
			    {{ Form::hidden('patient_id', $patient->id) }}
			@else
	            {{ Form::text('patient', '', array('disabled')) }}
			@endif
			<span class="help-inline">{{ $errors->first('patient') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('date') ? 'error' : '' }}">
			{{ Form::label('date', 'Date and Time', array('class' => 'control-label')) }}
			<div class="form-inline controls">
				{{ Form::text('date', Input::old('date'), array('placeholder' => 'yyyy-mm-dd', 'class' => 'datepicker hasDatepicker')) }}
				<div class="input-append bootstrap-timepicker-component">
					<input type="text" name="apt_time" class="timepicker-default input-small">
					<span class="add-on">
					    <i class="icon-time"></i>
					</span>
				</div>
				<span class="help-inline">{{ $errors->first('date') }}</span>
			</div>
		</div>
		<!--<div class="control-group {{ $errors->has('reason_id') ? 'error' : '' }}">
			{{ Form::label('reason_id', 'Reason', array('class' => 'control-label')) }}
			<div class="controls">
				<select name="reason_id">
					<option value="">--select--</option>
					@foreach($apt_reasons as $apt_reason)
					<option value="{{ $apt_reason->id }}">{{ $apt_reason->reason }}</option>
					@endforeach
				</select>
				<span class="help-inline">{{ $errors->first('reason_id') }}</span>
			</div>
		</div>-->
		<div class="control-group {{ $errors->has('notes') ? 'error' : '' }}">
			{{ Form::label('notes', 'Notes', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::textarea('notes', 'check-up', array('rows' => 3)) }}
				<span class="help-inline">{{ $errors->first('notes') }}</span>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{ Form::submit('Save Appointment', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('appointment') }}" class="btn">Cancel</a>
			</div>
		</div>
	{{ Form::close() }}

	@endif

@endsection

@section('styles')
	@parent
	{{ HTML::style('css/colorbox/colorbox.css') }}
@endsection

@section('scripts')
	@parent
	{{ HTML::script('js/jquery-ui.js') }}
	
	<script type='text/javascript'>
		$(function(){
			$( '.datepicker' ).pickadate({
				formatSubmit: 'yyyy-mm-dd',
				dateMin: true,
			});
			$("#datepicker").datepicker({ minDate: 0, dateFormat: 'yy-mm-dd' });
			$('.spatient').colorbox({href:BASE + '/patient/msearch', width: '70%', height: '50%'});
			$('.timepicker-default').timepicker();
		});
	</script>
	{{ HTML::script('js/bootstrap/bootstrap-timepicker.js') }}
	{{ HTML::script('js/colorbox/jquery.colorbox-min.js') }}
@endsection