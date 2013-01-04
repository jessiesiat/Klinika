@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('patient') }}">Patients</a> <span class="divider">/</span></li>
	<li class="active">New</li>
@endsection

@section('content')

	{{ Form::open(action('patient.new'), 'POST', array('class' => 'form-horizontal')) }}
	<div id="middle-bar">
		New Patient
		<span class="pull-right btn-bar">{{ Form::submit('Save Patient Info.', array('class' => 'btn btn-primary')) }}</span>
	</div>	
		<fieldset>
    	<legend>Basic Information:</legend>
	 	<div class="control-group {{ $errors->has('f_name') ? 'error' : '' }}">
	        {{ Form::label('name', 'Patient Name', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('l_name', Input::old('l_name'), array('placeholder' => 'Last name')) }}
		      {{ Form::text('f_name', Input::old('f_name'), array('placeholder' => 'First name')) }} 		  
		      <span class="help-inline">{{ $errors->first('f_name').' '.$errors->first('l_name') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('f_name') ? 'error' : '' }}">
		    <div class="controls">
		      {{ Form::text('m_name', Input::old('m_name'), array('class' => 'input', 'placeholder' => 'Middle name')) }}
		    </div>
		</div>
	    <div class="control-group {{ $errors->has('gender') ? 'error' : '' }}">
	        {{ Form::label('gender', 'Gender', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="gender">
	            <option value="male">Male</option>
	            <option value="female">Female</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('gender') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('marital_status') ? 'error' : '' }}">
	        {{ Form::label('marital_status', 'Marital Status', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="marital_status">
	            <option value="single">Single</option>
	            <option value="maried">Maried</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('marital_status') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('birthdate') ? 'error' : '' }}">
			{{ Form::label('birthdate', 'Birth Date (yyyy-mm-dd)', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('birthdate', Input::old('birthdate'), array('placeholder' => 'yyyy-mm-dd', 'class' => 'calendar')) }}
				<span class="help-inline">{{ $errors->first('birthdate') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('race') ? 'error' : '' }}">
	        {{ Form::label('race', 'Race', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('race', Input::old('race')) }}
		      <span class="help-inline">{{ $errors->first('race') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('education') ? 'error' : '' }}">
	        {{ Form::label('education', 'Education', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('education', Input::old('education')) }}
		      <span class="help-inline">{{ $errors->first('education') }}</span>
		    </div>
	    </div>
		</fieldset>

		<fieldset>
    	<legend>Contact Information:</legend>
		<div class="control-group {{ $errors->has('landline_home') ? 'error' : '' }}">
	        {{ Form::label('landline_home', 'Home Phone', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('landline_home', Input::old('landline_home')) }}
		      <span class="help-inline">{{ $errors->first('landline_home') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('landline_work') ? 'error' : '' }}">
	        {{ Form::label('landline_work', 'Work Phone', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('landline_work', Input::old('landline_work')) }}
		      <span class="help-inline">{{ $errors->first('landline_work') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('mobile') ? 'error' : '' }}">
	        {{ Form::label('mobile', 'Mobile Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('mobile', Input::old('mobile')) }}
		      <span class="help-inline">{{ $errors->first('mobile') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
	        {{ Form::label('email', 'Email Address', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('email', Input::old('email')) }}
		      <span class="help-inline">{{ $errors->first('email') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address1') ? 'error' : '' }}">
	        {{ Form::label('address1', 'Address1', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('address1', Input::old('address1'), array('class' => 'input-xlarge')) }}
		      <span class="help-inline">{{ $errors->first('address1') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address2') ? 'error' : '' }}">
	        {{ Form::label('address2', 'Address2', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('address2', Input::old('address2'), array('class' => 'input-xlarge')) }}
		      <span class="help-inline">{{ $errors->first('address2') }}</span>
		    </div>
	    </div>
		</fieldset>

	    <fieldset>
    	<legend>Additional Information:</legend>
    	<div class="control-group {{ $errors->has('patient_type') ? 'error' : '' }}">
	        {{ Form::label('patient_type', 'Patient Type', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="patient_type">
	            <option value="A">Type A</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('patient_type') }}</span>
		    </div>
	    </div>
    	<div class="control-group {{ $errors->has('blood_type') ? 'error' : '' }}">
	        {{ Form::label('blood_type', 'Blood Type', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="blood_type">
	            <option value="A">Type A</option>
	            <option value="B">Type B</option>
	            <option value="AB">Type AB</option>
	            <option value="O">Type O</option>
	            <option value="">Not Known</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('blood_type') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('smoker') ? 'error' : '' }}">
	        {{ Form::label('smoker', 'Smoker', array('class' => 'control-label')) }}
		    <div class="controls">
		      <input type="radio" name="smoker" value="y">
				Is a smoker
			  <input type="radio" name="smoker" value="n">
			    Is not a smoker
		      <span class="help-inline">{{ $errors->first('smoker') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address2') ? 'error' : '' }}">
	        {{ Form::label('drinker', 'Drinker', array('class' => 'control-label')) }}
		    <div class="controls">
		      <input type="radio" name="drinker" value="y">
				Is a drinker
			  <input type="radio" name="drinker" value="n">
			    Is not a drinker
		      <span class="help-inline">{{ $errors->first('address2') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('spouse_name') ? 'error' : '' }}">
	        {{ Form::label('spouse_name', 'Spouse Name', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('spouse_name', Input::old('spouse_name')) }}
		      <span class="help-inline">{{ $errors->first('spouse_name') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('spouse_contact_no') ? 'error' : '' }}">
	        {{ Form::label('spouse_contact_no', 'Contact Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('spouse_contact_no', Input::old('spouse_contact_no')) }}
		      <span class="help-inline">{{ $errors->first('spouse_contact_no') }}</span>
		    </div>
	    </div>
		</fieldset>

		<fieldset>
    	<legend>Charging Information:</legend>
    	<div class="control-group {{ $errors->has('company') ? 'error' : '' }}">
	        {{ Form::label('company', 'Company', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('company', Input::old('company')) }}
		      <span class="help-inline">{{ $errors->first('company') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('hmo') ? 'error' : '' }}">
	        {{ Form::label('hmo', 'HMO', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="hmo">
	            <option value=""></option>
			  </select>
		      <span class="help-inline">{{ $errors->first('hmo') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('hmo_no') ? 'error' : '' }}">
	        {{ Form::label('hmo_no', 'HMO Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('hmo_no', Input::old('hmo_no')) }}
		      <span class="help-inline">{{ $errors->first('hmo_no') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('credit_card') ? 'error' : '' }}">
	        {{ Form::label('credit_card', 'Credit Card', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('credit_card', Input::old('credit_card')) }}
		      <span class="help-inline">{{ $errors->first('credit_card') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('insurance') ? 'error' : '' }}">
	        {{ Form::label('insurance', 'Insurance', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('insurance', Input::old('insurance')) }}
		      <span class="help-inline">{{ $errors->first('insurance') }}</span>
		    </div>
	    </div>
    	</fieldset>

		<hr class="my-hr" />
		<div class="pull-right">
			{{ Form::submit('Save Patient Info.', array('class' => 'btn btn-primary')) }}
		</div>
		<!--
		<div class="control-group">
	    	<div class="controls">
		      {{ Form::submit('Save Patient', array('class' => 'btn btn-primary')) }}
		    </div>
	    </div>
		-->
	{{ Form::close() }}
	
@endsection

@section('scripts')
	@parent
	{{ HTML::script('js/jquery-ui.js') }}
	
	<script type='text/javascript'>
		$(function(){
			$("#datepicker").datepicker({ maxDate: 0, dateFormat: 'yy-mm-dd' });			
		});
	</script>
@endsection