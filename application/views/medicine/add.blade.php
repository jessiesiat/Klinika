@layout('layouts.main')

@section('styles')
 	@parent
 	{{ HTML::style('css/chosen.css') }}
@endsection

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('medicine') }}">Medicine</a> <span class="divider">/</span></li>
	<li class="active">Add</li>
@endsection

@section('content')

	<div id="middle-bar-small">Add Medicine Stock</div>
	{{ Form::open(action('medicine.add'), 'POST', array('class' => 'form-horizontal')) }}
	    <div class="control-group {{ $errors->has('medicine_name') ? 'error' : '' }}">
	        {{ Form::hidden('medicine_id', $medicine->id) }}
		    {{ Form::label('medicine_name', 'Name', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('medicine_name', $medicine->medicine_name, array('disabled')) }}
		      <span class="help-inline">{{ $errors->first('medicine_name') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('qty') ? 'error' : '' }}">
		    {{ Form::label('qty', 'Quantity', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('qty', Input::old('qty'), array('class' => 'input')) }}
		      {{ Form::hidden('uom', 'tablet') }}
		   	  <select name="uom" class="input-small chzn-select" data-placeholder="Choose a type..." tabindex="2" disabled >
			    <option value="tablet" {{ ($medicine->purchase_uom == 'tabled') ? 'selected' : '' }} >tablet</option>
			    <option value="ml" {{ ($medicine->purchase_uom == 'ml') ? 'selected' : '' }} >ML</option>
		      </select>   
		      <span class="help-inline">{{ $errors->first('qty').' '.$errors->first('uom') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('supplier_id') ? 'error' : '' }}">
		    {{ Form::label('supplier_id', 'Supplier', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="supplier_id" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
		      	@foreach($suppliers as $supplier)
			    <option value="{{ $supplier->id }}" {{ (Input::old('supplier_id') == $supplier->id) ? 'selected' : '' }} > {{ $supplier->supplier_name }} </option>
			    @endforeach
		      </select>   
		      <span class="help-inline">{{ $errors->first('supplier_id') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('or_number') ? 'error' : '' }}">
		    {{ Form::label('or_number', 'OR Number', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::text('or_number', Input::old('or_number')) }}
		      <span class="help-inline">{{ $errors->first('or_number') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('date_received') ? 'error' : '' }}">
			{{ Form::label('date_received', 'Date Receive', array('class' => 'control-label')) }}
			<div class="form-inline controls">
				{{ Form::text('date_received', (Input::old('date_received')) ? Input::old('date_received') : $date_today->format('j F, Y'), array('placeholder' => 'yyyy-mm-dd', 'class' => 'datepicker hasDatepicker', 'data-value' => $date_today->format('Y-m-d'))) }}
				<span class="help-inline">{{ $errors->first('date_received') }}</span>
			</div>
		</div>
	    <div class="control-group">
	    	<div class="controls">
		      {{ Form::submit('Add Stock', array('class' => 'btn btn-primary')) }}
		      &nbsp;<a href="{{ action('medicine') }}" class="btn">Cancel</a>
		    </div>
	    </div>
	{{ Form::close() }}

@endsection

@section('scripts')
	@parent
	{{ HTML::script('js/jquery-ui.js') }}
	{{ HTML::script('js/chosen.jquery.min.js') }}
	<script type='text/javascript'>
		$(function(){
			$( '.datepicker' ).pickadate({
				formatSubmit: 'yyyy-mm-dd',
				dateMax: true,
			});
			//$(".chzn-select").chosen(); 
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
		});
	</script>
@endsection