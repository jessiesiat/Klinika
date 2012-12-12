@layout('layouts.main')

@section('content')

	@if(isset($supplier))
		<div id="middle-bar-small">Edit Supplier</div>
		{{ Form::open(action('supplier.edit'), 'POST', array('class' => 'form-horizontal')) }}
            <div class="control-group {{ $errors->has('name') ? 'error' : '' }}">   
				{{ Form::hidden('supplier_id', $supplier->id) }}
				{{ Form::label('supplier_name', 'Supplier Name', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('supplier_name', $supplier->supplier_name) }}
				<span class="help-inline">{{ $errors->first('supplier_name') }}</span>
				</div>
			</div>
     		<div class="control-group {{ $errors->has('address') ? 'error' : '' }}">
				{{ Form::label('address', 'Address', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('address', $supplier->address) }}
				<span class="help-inline">{{ $errors->first('address') }}</span>
				</div>
			</div>
        	<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('email', $supplier->email) }}
				<span class="help-inline">{{ $errors->first('email') }}</span>
				</div>
			</div>
     		<div class="control-group {{ $errors->has('contact_number') ? 'error' : '' }}">
				{{ Form::label('contact_number', 'Contact Number', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('contact_number', $supplier->contact_number) }}
				<span class="help-inline">{{ $errors->first('contact_number') }}</span>
				</div>
			</div>
        	<div class="control-group {{ $errors->has('contact_person') ? 'error' : '' }}">
				{{ Form::label('contact_person', 'Contact Person', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('contact_person', $supplier->contact_person) }}
				<span class="help-inline">{{ $errors->first('contact_person') }}</span>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				{{ Form::submit('Update Supplier', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('supplier') }}" class="btn">Cancel</a>
				</div>
			</div>
		{{ Form::close() }}
	@else
		<div id="middle-bar-small">New Supplier</div>
		{{ Form::open(action('supplier.new'), 'POST', array('class' => 'form-horizontal')) }}
			<div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
				{{ Form::label('supplier_name', 'Supplier Name', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('supplier_name', Input::old('supplier_name')) }}
				<span class="help-inline">{{ $errors->first('supplier_name') }}</span>
				</div>
			</div>
			<div class="control-group {{ $errors->has('address') ? 'error' : '' }}">
				{{ Form::label('address', 'Address', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('address', Input::old('address')) }}
				<span class="help-inline">{{ $errors->first('address') }}</span>
				</div>
			</div>
			<div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
				{{ Form::label('email', 'Email', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('email', Input::old('email')) }}
				<span class="help-inline">{{ $errors->first('email') }}</span>
				</div>
			</div>
			<div class="control-group {{ $errors->has('contact_number') ? 'error' : '' }}">
				{{ Form::label('contact_number', 'Contact Number', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('contact_number', Input::old('contact_number')) }}
				<span class="help-inline">{{ $errors->first('contact_number') }}</span>
				</div>
			</div>
			<div class="control-group {{ $errors->has('contact_person') ? 'error' : '' }}">
				{{ Form::label('contact_person', 'Contact Person', array('class' => 'control-label')) }}
				<div class="controls">
				{{ Form::text('contact_person', Input::old('contact_person')) }}
				<span class="help-inline">{{ $errors->first('contact_person') }}</span>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
				{{ Form::submit('Save Supplier', array('class' => 'btn btn-primary')) }}
				&nbsp;<a href="{{ action('supplier') }}" class="btn">Cancel</a>
				</div>
			</div>
		{{ Form::close() }}
	@endif

@endsection