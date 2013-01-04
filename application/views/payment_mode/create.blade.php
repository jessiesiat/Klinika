@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('paymentmode') }}">Payment Mode</a> <span class="divider">/</span></li>
	@if(isset($payment_mode))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')
	
	@if(isset($payment_mode))

	<div id="middle-bar-small">Update Payment Mode</div>

	@else

	<div id="middle-bar-small">New Payment Mode</div>
	{{ Form::open(action('paymentmode.create'), 'POST', array('class' => 'form-horizontal')) }}
		
		<div class="control-group {{ $errors->has('payment_mode') ? 'error' : '' }}">
			{{ Form::label('payment_mode', 'Payment Mode', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('payment_mode') }}
				<span class="help-inline">{{ $errors->first('payment_mode') }}</span>
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
				{{ Form::submit('Save Payment Mode', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('paymentmode') }}" class="btn">Cancel</a>
			</div>
		</div>
		
	{{ Form::close() }}

	@endif

@endsection
