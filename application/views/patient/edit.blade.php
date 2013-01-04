@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('patient') }}">Patients</a> <span class="divider">/</span></li>
	<li class="active">Edit</li>
@endsection

@section('content')

	{{ Form::open(action('patient.edit'), 'POST', array('class' => 'form-horizontal')) }}

		<div id="middle-bar">
			Edit Patient Info.
			<span class="pull-right btn-bar">
				<a href="{{ action('patient.details', array($patient->id)) }}" class="btn">Cancel</a>&nbsp;
				{{ Form::submit('Update Patient Info.', array('class' => 'btn btn-primary')) }}
			</span>
		</div>

		{{ Form::hidden('patient_id', $patient->id) }}
		
		<div class="name-input" style="display:none">
		{{ Form::text('f_name', $patient->f_name) }} 
		{{ Form::text('m_name', $patient->m_name, array('class' => 'input-small')) }}
		{{ Form::text('l_name', $patient->l_name, array('placeholder' => 'last name')) }}		
		</div>
		
		<fieldset>
    	<legend>Basic Information:</legend>
	 	<div class="control-group {{ $errors->has('f_name') ? 'error' : '' }}">
	        {{ Form::label('name', 'Patient Name', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('l_name', $patient->l_name, array('placeholder' => 'Last name')) }}
		      {{ Form::text('f_name', $patient->f_name, array('placeholder' => 'First name')) }} 
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
	            <option value="male" {{ ($patient->gender == 'male') ? 'selected' : '' }} >Male</option>
	            <option value="female" {{ ($patient->gender == 'female') ? 'selected' : '' }} >Female</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('gender') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('marital_status') ? 'error' : '' }}">
	        {{ Form::label('marital_status', 'Marital Status', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="marital_status">
	            <option value="single" {{ ($patient->marital_status == 'single') ? 'selected' : '' }} >Single</option>
	            <option value="married" {{ ($patient->marital_status == 'married') ? 'selected' : '' }} >Maried</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('marital_status') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('birthdate') ? 'error' : '' }}">
			{{ Form::label('birthdate', 'Birth Date (yyyy-mm-dd)', array('class' => 'control-label')) }}
			<div class="controls">
				{{ Form::text('birthdate', $patient->birthdate, array('placeholder' => 'yyyy-mm-dd', 'class' => 'hasDatepicker')) }}
				<span class="help-inline">{{ $errors->first('birthdate') }}</span>
			</div>
		</div>
		<div class="control-group {{ $errors->has('race') ? 'error' : '' }}">
	        {{ Form::label('race', 'Race', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('race', $patient->race) }}
		      <span class="help-inline">{{ $errors->first('race') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('education') ? 'error' : '' }}">
	        {{ Form::label('education', 'Education', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('education', $patient->education) }}
		      <span class="help-inline">{{ $errors->first('education') }}</span>
		    </div>
	    </div>
		</fieldset>

		<fieldset>
    	<legend>Contact Information:</legend>
		<div class="control-group {{ $errors->has('landline_home') ? 'error' : '' }}">
	        {{ Form::label('landline_home', 'Home Phone', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('landline_home', $patient->landline_home) }}
		      <span class="help-inline">{{ $errors->first('landline_home') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('landline_work') ? 'error' : '' }}">
	        {{ Form::label('landline_work', 'Work Phone', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('landline_work', $patient->landline_work) }}
		      <span class="help-inline">{{ $errors->first('landline_work') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('mobile') ? 'error' : '' }}">
	        {{ Form::label('mobile', 'Mobile Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('mobile', $patient->mobile) }}
		      <span class="help-inline">{{ $errors->first('mobile') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
	        {{ Form::label('email', 'Email Address', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('email', $patient->email) }}
		      <span class="help-inline">{{ $errors->first('email') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address1') ? 'error' : '' }}">
	        {{ Form::label('address1', 'Address1', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('address1', $patient->address1, array('class' => 'input-xlarge')) }}
		      <span class="help-inline">{{ $errors->first('address1') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address2') ? 'error' : '' }}">
	        {{ Form::label('address2', 'Address2', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('address2', $patient->address2, array('class' => 'input-xlarge')) }}
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
		      	@foreach($patient_type as $type)
	            <option value="{{ $type->id }}">{{ $type->patient_type }}</option>
	            @endforeach
			  </select>
		      <span class="help-inline">{{ $errors->first('patient_type') }}</span>
		    </div>
	    </div>
    	<div class="control-group {{ $errors->has('blood_type') ? 'error' : '' }}">
	        {{ Form::label('blood_type', 'Blood Type', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="blood_type">
	            <option value="A" {{ ($patient->blood_type == 'A') ? 'selected' : '' }}>Type A</option>
	            <option value="B" {{ ($patient->blood_type == 'B') ? 'selected' : '' }} >Type B</option>
	            <option value="AB" {{ ($patient->blood_type == 'AB') ? 'selected' : '' }} >Type AB</option>
	            <option value="O" {{ ($patient->blood_type == 'O') ? 'selected' : '' }} >Type O</option>
	            <option value="" {{ ($patient->blood_type == '') ? 'selected' : '' }} >Not Known</option>
			  </select>
		      <span class="help-inline">{{ $errors->first('blood_type') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('smoker') ? 'error' : '' }}">
	        {{ Form::label('smoker', 'Smoker', array('class' => 'control-label')) }}
		    <div class="controls">
		      <input type="radio" name="smoker" value="1" {{ ($patient->smoker == 1) ? 'checked' : '' }} >
				Is a smoker
			  <input type="radio" name="smoker" value="0"{{ ($patient->smoker == 0) ? 'checked' : '' }} >
			    Is not a smoker
		      <span class="help-inline">{{ $errors->first('smoker') }}</span>
		    </div>
	    </div>
		<div class="control-group {{ $errors->has('address2') ? 'error' : '' }}">
	        {{ Form::label('drinker', 'Drinker', array('class' => 'control-label')) }}
		    <div class="controls">
		      <input type="radio" name="drinker" value="1" {{ ($patient->drinker == 1) ? 'checked' : '' }} >
				Is a drinker
			  <input type="radio" name="drinker" value="0"{{ ($patient->drinker == 0) ? 'checked' : '' }} >
			    Is not a drinker
		      <span class="help-inline">{{ $errors->first('address2') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('spouse_name') ? 'error' : '' }}">
	        {{ Form::label('spouse_name', 'Spouse Name', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('spouse_name', $patient->spouse_name) }}
		      <span class="help-inline">{{ $errors->first('spouse_name') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('spouse_contact_no') ? 'error' : '' }}">
	        {{ Form::label('spouse_contact_no', 'Contact Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('spouse_contact_no', $patient->spouse_contact_no) }}
		      <span class="help-inline">{{ $errors->first('spouse_contact_no') }}</span>
		    </div>
	    </div>
		</fieldset>

		<fieldset>
    	<legend>Charging Information:</legend>
    	<div class="control-group {{ $errors->has('company') ? 'error' : '' }}">
	        {{ Form::label('company', 'Company', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('company', $patient->company) }}
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
		      {{ Form::text('hmo_no', $patient->hmo_no) }}
		      <span class="help-inline">{{ $errors->first('hmo_no') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('credit_card') ? 'error' : '' }}">
	        {{ Form::label('credit_card', 'Credit Card', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('credit_card', $patient->credit_card) }}
		      <span class="help-inline">{{ $errors->first('credit_card') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('insurance') ? 'error' : '' }}">
	        {{ Form::label('insurance', 'Insurance', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('insurance', $patient->insurance) }}
		      <span class="help-inline">{{ $errors->first('insurance') }}</span>
		    </div>
	    </div>
    	</fieldset>

    	<hr />
		<div class="pull-right">
			<a href="{{ action('patient.details', array($patient->id)) }}" class="btn">Cancel</a>&nbsp;
			{{ Form::submit('Update Patient Info.', array('class' => 'btn btn-primary')) }}
		</div>

{{ Form::close() }}

@endsection

@section('scripts')
@parent
{{ HTML::script('js/jquery-ui.js') }}
<script>
$(function(){
	$('.edit-name').click(function(e){
		e.preventDefault();
		$('.name-input').show();
		$('.name-view').hide();
	});
	$("#datepicker").datepicker({ maxDate: 0, dateFormat: 'yy-mm-dd' });			
});
</script>
@endsection