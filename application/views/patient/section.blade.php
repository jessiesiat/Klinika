@layout('layouts.main')

@section('styles')
  @parent
  {{ HTML::style('css/chosen.css') }}
@endsection

@section('breadcrumb')
  @parent
  <li><a href="{{ URL::to_action('patient') }}">Patients</a> <span class="divider">/</span></li>
  <li class="active">Section</li>
@endsection

@section('content')

    <div id="middle-bar-small">
      Patient Section
      <span class="pull-right section-bar">
        @if($pawaits->patient->picture)
          {{ HTML::image('uploads/patients_image/'.$pawaits->patient->picture, $pawaits->patient->f_name, array('class' => 'section_image')) }}
        @else
          {{ HTML::image('uploads/patients_image/default.jpg', 'image', array('class' => 'section_image')) }}      
        @endif
        {{ $pawaits->patient->f_name.' '.$pawaits->patient->m_name.' '.$pawaits->patient->l_name }}
      </span>
    </div>
    <p>{{ Service::find($pawaits->service_id)->service }} </p>
    
    <span class="cleafix"></span>

      {{ Form::open(action('patient@section'), 'POST', array('class' => 'form-horizontal')) }}

        {{ Form::hidden('await_id', $pawaits->id) }}
        {{ Form::hidden('patient_id', $pawaits->patient->id) }}
        {{ Form::hidden('date_time_in', $pawaits->time_in) }}
        {{ Form::hidden('complaint', $pawaits->complaint ) }}

        <table class="table table-striped">
          <tr>
            <td class="control-group {{ $errors->has('service_id') ? 'error' : '' }}">
              {{ Form::label('service_id', 'Service Given') }}
              <select name="service_id" class="input-xlarge chzn-select" data-placeholder="Choose a type..." tabindex="2">
                @foreach($services as $service)
                <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                @endforeach
              </select>
            </td>
            <td class="control-group {{ $errors->has('complaint') ? 'error' : '' }}">
              {{ Form::label('complaint', 'Complaints') }}
              {{ Form::textarea('complaint', $pawaits->complaint, array('rows' => '2', 'class' => 'input-xlarge')) }}
            </td>
          </tr>
          <tr>
            <td class="control-group {{ $errors->has('procedure') ? 'error' : '' }}">
              {{ Form::label('procedure', 'Tests and Procedures') }}
              {{ Form::textarea('procedure', Input::old('procedure'), array('rows' => '2', 'class' => 'input-xlarge')) }}
            </td>
            <td class="control-group {{ $errors->has('diagnosis') ? 'error' : '' }}">
              {{ Form::label('diagnosis', 'Diagnosis') }}
              {{ Form::textarea('diagnosis', Input::old('diagnosis'), array('rows' => '2', 'class' => 'input-xlarge')) }}
            </td>
          </tr>
          <tr>
            <td class="control-group {{ $errors->has('result') ? 'error' : '' }}">
              {{ Form::label('result', 'Result') }}
              {{ Form::textarea('result', Input::old('result'), array('rows' => '2', 'class' => 'input-xlarge')) }}
            </td>
            <td class="control-group {{ $errors->has('physical_exam') ? 'error' : '' }}">
              {{ Form::label('physical_exam', 'Physical Exam') }}
              {{ Form::textarea('physical_exam', Input::old('physical_exam'), array('rows' => '2', 'class' => 'input-xlarge')) }}
            </td>
          </tr>
        </table>

        <div class="control-group {{ $errors->has('medication') ? 'error' : '' }}">
          {{ Form::label('medication', 'Medication', array('class' => 'control-label')) }}
          <div class="controls">
            <select name="medicine_id[]" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
              @foreach($medicines as $medicine)
                <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
              @endforeach
            </select>
            <select name="uom[]" class="input-small chzn-select" data-placeholder="Choose a type..." tabindex="2">
              <option value="tablet">tablet</option>
              <option value="mat">ML</option>
            </select>
            {{ Form::text('qty[]', '', array('class' => 'input-mini', 'placeholder' => 'qty', 'style' => 'margin-bottom: 1px;')) }}
            <a href="javascript:void(0)" class="addMedicationRowHtml btn"><i class="icon-plus"></i></a>
            <div id="medicationContainer"></div>
            <span class="help-inline">{{ $errors->first('medication') }}</span>
          </div>
        </div>

        <div class="pull-right">
          <div class="controls">
            {{ Form::submit('Save Record', array('class' => 'btn btn-primary')) }}
            &nbsp;<a href="{{ action('/') }}" class="btn">Cancel</a>
          </div>
        </div>
      {{ Form::close() }}

    <!-- Hidden row to be appended for Medication fields -->
    <div class="appendRow" style="display:none">
      <div class="mRow">
          <select name="medicine_id[]" class="chzn-select" data-placeholder="Choose a type..." tabindex="2">
            @foreach($medicines as $medicine)
              <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
            @endforeach
          </select>
          <select name="uom[]" class="input-small chzn-select" data-placeholder="Choose a type..." tabindex="2">
            <option value="tablet">tablet</option>
            <option value="mat">ML</option>
          </select>
          <input type="text" name="qty[]" class="input-mini" placeholder="qty" />
          <a href="javascript:void(0)" class="rmMedicationRowHtml btn"><i class="icon-minus"></i></a>
      </div>
    </div>

@endsection

@section('styles')
@parent
<style type="text/css">
#medicationContainer .mRow {
  margin: 6px 4px 0 0;
}
.table th, .table td {
  border-top: none;
}
</style>
@endsection

@section('scripts')
@parent
{{ HTML::script('js/chosen.jquery.min.js') }}
<script>
$(document).ready(function() {
    var html_medication_template = $('.appendRow').html();

    $('.addMedicationRowHtml').on('click', function() {
        $('#medicationContainer').append(html_medication_template);
    });

    $('.rmMedicationRowHtml').click(function() {
        $(this).parent().remove();
        $("p").remove();
    });
    //$(".chzn-select").chosen(); 
    $(".chzn-select-deselect").chosen({allow_single_deselect:true});
});
</script>
@endsection