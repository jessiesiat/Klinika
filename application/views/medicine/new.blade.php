@layout('layouts.main')

@section('styles')
	@parent
	{{ HTML::style('css/chosen.css') }}
@endsection

@section('breadcrumb')
	@parent
	<li><a href="{{ URL::to_action('medicine') }}">Medicine</a> <span class="divider">/</span></li>
	@if(isset($medicine))
	<li class="active">Update</li>
	@else
	<li class="active">New</li>
	@endif
@endsection

@section('content')

	@if(isset($medicine))
	{{ Form::open(action('medicine.edit'), 'POST', array('class' => 'form-horizontal')) }}
		<div id="middle-bar">
			Edit medicine
			<span class="pull-right btn-bar">
				&nbsp;<a href="{{ action('medicine') }}" class="btn">Cancel</a>
			    {{ Form::submit('Update Medicine', array('class' => 'btn btn-primary')) }}
			</span>
		</div>
	    <fieldset>
    	<legend>Basic Information:</legend>
	    <div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
		  {{ Form::label('medicine_name', 'Medicine Name', array('class' => 'control-label')) }}
		  <div class="controls">
		  	{{ Form::text('medicine_name', $medicine->medicine_name) }}
		  	<span class="help-inline">{{ $errors->first('medicine_name') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('type') ? 'error' : '' }}">
		  {{ Form::label('type', 'Type', array('class' => 'control-label')) }}
		  <div class="controls">
		    <select name="type" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
			  <option value="1" {{ ($medicine->type == 1) ? 'selected' : '' }} >branded</option>
			  <option value="0" {{ ($medicine->type == 0) ? 'selected' : '' }} >generic</option>
		    </select>
		    <span class="help-inline">{{ $errors->first('type') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('desc') ? 'error' : '' }}">
		    {{ Form::label('desc', 'Description', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::textarea('desc', $medicine->desc, array('rows' => 3)) }}
		      <span class="help-inline">{{ $errors->first('desc') }}</span>
		    </div>
	    </div>
		</fieldset>

	    <fieldset>
    	<legend>Purchase Information:</legend>
    	<div class="control-group {{ $errors->has('supplier') ? 'error' : '' }}">
		    {{ Form::label('supplier_id', 'Supplier', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="supplier_id" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
		      	@foreach($suppliers as $supplier)
			    <option value="{{ $supplier->id }}" {{ ($medicine->supplier_id == $supplier->id) ? 'selected' : '' }} >{{ $supplier->supplier_name }}</option>
			    @endforeach
		      </select>
		      <span class="help-inline">{{ $errors->first('supplier') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_uom') ? 'error' : '' }}">
		    {{ Form::label('purchase_uom', 'Purchase UOM', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="purchase_uom" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">      	
			    <option value="tablet" {{ ($medicine->purchase_uom == 'tablet') ? 'selected' : '' }} >Tablet</option>
			    <option value="mat" {{ ($medicine->purchase_uom == 'ml') ? 'selected' : '' }} >ML</option>
		      </select>
		      <span class="help-inline">{{ $errors->first('purchase_uom') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_size_qty') ? 'error' : '' }}">
		  {{ Form::label('purchase_size_qty', 'Purchase Size Qty.', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('purchase_size_qty', $medicine->purchase_size_qty, array('class' => 'input')) }}
		    <span class="help-inline">{{ $errors->first('purchase_size_qty') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_cost') ? 'error' : '' }}">
		  {{ Form::label('purchase_cost', 'Purchase Cost', array('class' => 'control-label')) }}
		  <div class="controls">
		    <div class="input-prepend">
			  <span class="add-on">PHP</span>
			  {{ Form::text('purchase_cost', $medicine->purchase_cost, array('class' => 'input-append')) }}
		    </div>
		    <span class="help-inline">{{ $errors->first('purchase_cost') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_tax') ? 'error' : '' }}">
		  {{ Form::label('purchase_tax', 'Purchase Tax (%)', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('purchase_tax', $medicine->purchase_tax) }}
		    <span class="help-inline">{{ $errors->first('purchase_tax') }}</span>
		  </div>
	    </div>
	    </fieldset>

	    <fieldset>
    	<legend>Selling Information:</legend>
	    <div class="control-group {{ $errors->has('selling_uom') ? 'error' : '' }}">
		    {{ Form::label('selling_uom', 'Selling UOM', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="selling_uom" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
			    <option value="tablet" {{ ($medicine->selling_uom == 'tablet') ? 'selected' : '' }} >Tablet</option>
			    <option value="mat" {{ ($medicine->selling_uom == 'ml') ? 'selected' : '' }} >ML</option>
		      </select>
		      <span class="help-inline">{{ $errors->first('selling_uom') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('selling_price') ? 'error' : '' }}">
		  {{ Form::label('selling_price', 'Selling Price', array('class' => 'control-label')) }}
		  <div class="controls">
		    <div class="input-prepend">
			  <span class="add-on">PHP</span>
			  {{ Form::text('selling_price', $medicine->selling_price, array('class' => 'input-append')) }}
		    </div>
		    <span class="help-inline">{{ $errors->first('selling_price') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('selling_tax') ? 'error' : '' }}">
		  {{ Form::label('selling_tax', 'Selling Tax', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('selling_tax', $medicine->selling_tax) }}
		    <span class="help-inline">{{ $errors->first('selling_tax') }}</span>
		  </div>
	    </div>
		</fieldset>
	    <hr class="my-hr" />
	    <div class="pull-right">
	    	&nbsp;<a href="{{ action('medicine') }}" class="btn">Cancel</a>
		    {{ Form::submit('Update Medicine', array('class' => 'btn btn-primary')) }}
	    </div>
	{{ Form::close() }}

	@else
	{{ Form::open(action('medicine.new'), 'POST', array('class' => 'form-horizontal')) }}
		<div id="middle-bar">
			New medicine
			<span class="pull-right btn-bar">
				{{ Form::submit('Save Medicine', array('class' => 'btn btn-primary')) }}
			</span>
		</div>
		<fieldset>
    	<legend>Basic Information:</legend>
	    <div class="control-group {{ $errors->has('medicine_name') ? 'error' : '' }}">
		  {{ Form::label('medicine_name', 'Medicine Name', array('class' => 'control-label')) }}
		  <div class="controls">
		  	{{ Form::text('medicine_name', Input::old('medicine_name')) }}
		  	<span class="help-inline">{{ $errors->first('medicine_name') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('type') ? 'error' : '' }}">
		  {{ Form::label('type', 'Type', array('class' => 'control-label')) }}
		  <div class="controls">
		    <select name="type" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
			  <option value="1" {{ (Input::old('type') == 1) ? 'selected' : '' }} >branded</option>
			  <option value="0" {{ (Input::old('type') == 0) ? 'selected' : '' }} >generic</option>
		    </select>
		    <span class="help-inline">{{ $errors->first('type') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('desc') ? 'error' : '' }}">
		    {{ Form::label('desc', 'Description', array('class' => 'control-label')) }}
		    <div class="controls">
		      {{ Form::textarea('desc', Input::old('desc'), array('rows' => 3)) }}
		      <span class="help-inline">{{ $errors->first('desc') }}</span>
		    </div>
	    </div>
		</fieldset>

	    <fieldset>
    	<legend>Purchase Information:</legend>
    	<div class="control-group {{ $errors->has('supplier') ? 'error' : '' }}">
		    {{ Form::label('supplier_id', 'Supplier', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="supplier_id" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
		      	@foreach($suppliers as $supplier)
			    <option value="{{ $supplier->id }}" {{ (Input::old('supplier_id') == $supplier->id) ? 'selected' : '' }} >{{ $supplier->supplier_name }}</option>
			    @endforeach
		      </select>
		      <span class="help-inline">{{ $errors->first('supplier') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_uom') ? 'error' : '' }}">
		    {{ Form::label('purchase_uom', 'Purchase UOM', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="purchase_uom" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
			    <option value="tablet" {{ (Input::old('purchase_uom') == 'tablet') ? 'selected' : '' }} >Tablet</option>
			    <option value="mat" {{ (Input::old('purchase_uom') == 'ml') ? 'selected' : '' }} >ML</option>
		      </select>
		      <span class="help-inline">{{ $errors->first('purchase_uom') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_size_qty') ? 'error' : '' }}">
		  {{ Form::label('purchase_size_qty', 'Purchase Size Qty.', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('purchase_size_qty', Input::old('purchase_size_qty'), array('class' => 'input')) }}
		    <span class="help-inline">{{ $errors->first('purchase_size_qty') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_cost') ? 'error' : '' }}">
		  {{ Form::label('purchase_cost', 'Purchase Cost', array('class' => 'control-label')) }}
		  <div class="controls">
		    <div class="input-prepend">
			  <span class="add-on">PHP</span>
			  {{ Form::text('purchase_cost', Input::old('purchase_cost'), array('class' => 'input-append')) }}
		    </div>
		    <span class="help-inline">{{ $errors->first('purchase_cost') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('purchase_tax') ? 'error' : '' }}">
		  {{ Form::label('purchase_tax', 'Purchase Tax (%)', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('purchase_tax', Input::old('purchase_tax')) }}
		    <span class="help-inline">{{ $errors->first('purchase_tax') }}</span>
		  </div>
	    </div>
	    </fieldset>

	    <fieldset>
    	<legend>Selling Information:</legend>
	    <div class="control-group {{ $errors->has('selling_uom') ? 'error' : '' }}">
		    {{ Form::label('selling_uom', 'Selling UOM', array('class' => 'control-label')) }}
		    <div class="controls">
		      <select name="selling_uom" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
			    <option value="tablet" {{ (Input::old('selling_uom') == 'tablet') ? 'selected' : '' }} >Tablet</option>
			    <option value="mat" {{ (Input::old('selling_uom') == 'ml') ? 'selected' : '' }} >ML</option>
		      </select>
		      <span class="help-inline">{{ $errors->first('selling_uom') }}</span>
		    </div>
	    </div>
	    <div class="control-group {{ $errors->has('selling_price') ? 'error' : '' }}">
		  {{ Form::label('selling_price', 'Selling Price', array('class' => 'control-label')) }}
		  <div class="controls">
		    <div class="input-prepend">
			  <span class="add-on">PHP</span>
			  {{ Form::text('selling_price', Input::old('selling_price'), array('class' => 'input-append')) }}
		    </div>
		    <span class="help-inline">{{ $errors->first('selling_price') }}</span>
		  </div>
	    </div>
	    <div class="control-group {{ $errors->has('selling_tax') ? 'error' : '' }}">
		  {{ Form::label('selling_tax', 'Selling Tax (%)', array('class' => 'control-label')) }}
		  <div class="controls">
			{{ Form::text('selling_tax', Input::old('selling_tax')) }}
		    <span class="help-inline">{{ $errors->first('selling_tax') }}</span>
		  </div>
	    </div>
		</fieldset>
		<hr class="my-hr" />
	    <div class="pull-right">
		      {{ Form::submit('Save Medicine', array('class' => 'btn btn-primary')) }}
	    </div>

	{{ Form::close() }}
	@endif

@endsection

@section('scripts')
	@parent
	{{ HTML::script('js/chosen.jquery.min.js') }}
	<script type='text/javascript'>
		//$(".chzn-select").chosen(); 
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
	</script>
@endsection