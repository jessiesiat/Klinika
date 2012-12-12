@layout('layouts.clean')

@section('content')

<div class="span9">

  <div class="pull-right">
    <ul class="my-nav-list">
      <li><a href="#myModalCheckup" role="button" data-toggle="modal">For Check-up today</a><br/></li>
      <li><a href="{{ action('appointment@new', array($pdetails->id)) }}">Schedule Appointment</a><br/></li>
      <li><a href="#myModalImage" role="button" data-toggle="modal">Image</a></li>
    </ul>
  </div>
  <div id="pad">
    @if($pdetails->picture)
      {{ HTML::image('uploads/patients_image/'.$pdetails->picture, $pdetails->f_name, array('class' => 'patient_image')) }}
    @else
      {{ HTML::image('uploads/patients_image/default.jpg', 'image', array('class' => 'patient_image')) }}      
    @endif
  	<h5>{{ Str::upper($pdetails->f_name.' '.$pdetails->l_name) }}</h5>
  	<i class="icon-envelope"></i> {{ $pdetails->email }}
  	<br/><i class="icon-phone"></i> {{ $pdetails->mobile }}
  	<p>{{ $pdetails->notes }}</p>
  </div>
  <hr/>

  <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#basic-info">Basic Info</a></li>
      <li><a href="#history">History</a></li>
  </ul>

  <div class="tab-content">
      <div class="tab-pane active" id="basic-info">
        <a href="{{ action('patient.edit', array($pdetails->id)) }}" class="pull-right muted"><i class="icon-edit"></i></a>
        <p>Address1: {{ ($pdetails->address1) ? $pdetails->address1 : 'n/a' }}</p>
        <p>Address2: {{ ($pdetails->address2) ? $pdetails->address2 : 'n/a' }}</p>
        <p>Gender: {{ $pdetails->gender }}</p>
        <p>Race: {{ ($pdetails->race) ? $pdetails->race : 'n/a' }}</p>
        <p>Education: {{ ($pdetails->education) ? $pdetails->education : 'n/a' }}</p>
        <p>Company: {{ ($pdetails->company) ? $pdetails->company : 'n/a' }}</p>
        <p>Marital Status: {{ ($pdetails->marital_status) ? $pdetails->marital_status : 'n/a' }}</p>
        <p>Blood Type: {{ $pdetails->blood_type }}</p>
        <p>Smoker: {{ ($pdetails->smoker) ? 'Yes' : 'No' }}</p>
        <p>Drinker: {{ ($pdetails->drinker) ? 'Yes' : 'No' }}</p>
        <p>Notes: {{ ($pdetails->notes) ? $pdetails->notes : 'n/a' }}</p>
      </div>

      <div class="tab-pane" id="history">
        <table class="table table-condensed table-striped">
            <thead>
              <tr>
                <th>Date and Time</th><th>Complaint</th><th>Diagnosis</th><th>Procedure</th><th>Prescription</th><th>Notes</th><th></th>
              </tr>
            </thead>
            <tbody>
              @forelse($pdetails->history as $phistory)
              <tr>
                <td>{{ $phistory->date_time_in }}</td>
                <td>{{ $phistory->complaint }}</td>
                <td>{{ $phistory->diagnosis }}</td>
                    <td>{{ $phistory->procedure }}</td>
                    <td>{{ $phistory->prescription }}</td>
                    <td>{{ $phistory->notes }}</td>
                    <td>
                        <a href="{{ action('billing.details', array($phistory->id)) }}">details</a>
                    </td>
              </tr>
                @empty
                <tr>
                    <td colspan="6">No medical history yet.</td>
                </tr>
              @endforelse
            </tbody>
        </table>
      </div>
  </div>
  
</div>

<!-- Hidden Modal -->
<div id="myModalImage" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  {{ Form::open_for_files('patient/image') }}
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Patient Image</h3>
  </div>
  <div class="modal-body">
    {{ Form::hidden('patient_id', $pdetails->id) }}
    {{ Form::hidden('f_name', $pdetails->f_name) }}
    {{ Form::label('patient_image', 'Select Image') }}
    {{ Form::file('patient_image') }}
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Save Image</button>
  </div>
  {{ Form::close() }}
</div>

<div id="myModalCheckup" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  {{ Form::open(action('patient.checkup'), 'POST', array('class' => 'form-horizontal')) }}
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Enter Patient Complaint</h3>
  </div>
  <div class="modal-body">
    {{ Form::hidden('patient_id', $pdetails->id) }}
    <div class="control-group">
      {{ Form::label('service_id', 'Service', array('class' => 'control-label')) }}
      <div class="form-inline controls">
        <select name="service_id" class="input-xlarge">
          @foreach($services as $service)
          <option value="{{ $service->id }}">{{ $service->service_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="control-group">
      {{ Form::label('complaint', 'Complaint', array('class' => 'control-label')) }}
      <div class="form-inline controls">
        {{ Form::textarea('complaint', 'for Checkup', array('rows' => '3', 'class' => 'input-xlarge')) }}
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Submit Complaint</button>
  </div>
  {{ Form::close() }}
</div>

@endsection

@section('styles')
@parent
<style>
#myModal {
  width: 900px; /* SET THE WIDTH OF THE MODAL */
  margin: -250px 0 0 -450px; /* CHANGE MARGINS TO ACCOMODATE THE NEW WIDTH (original = margin: -250px 0 0 -280px;) */
}
.form-horizontal .control-label {
  width: 110px;
}
.form-horizontal .controls {
  margin-left: 140px;
}
</style>
@endsection

@section('scripts')
@parent
<script>
  $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
  });
</script>
@endsection