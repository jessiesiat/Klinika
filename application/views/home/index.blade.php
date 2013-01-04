@layout('layouts.main')

@section('content')

  <div id="middle-bar-small">Doctor's Dashboard</div>
  <table class="table table-bordered table-condensed">
  <thead class="dash_head">
    <tr><th colspan="2">Patients Waiting</th></tr>
  </thead>
  <tbody>
     @forelse($patients_awaits as $pawaits)
    <tr>
      <td>
        <span class="pull-right"><a href="#myModalCancel" role="button" data-toggle="modal" id="{{ $pawaits->id }}" class="btn btn-mini pawaits-cancel">cancel</a></span>
        @if($pawaits->is_appointment)
        <span class="label label-info">Appointment</span>
        @else
        <span class="label label-warning">Visit</span>
        @endif
        <a href="{{ action('patient@section', array($pawaits->id)) }}">
          <strong>{{ $pawaits->patient->f_name.' '.$pawaits->patient->m_name.' '.$pawaits->patient->l_name }}</strong>
          {{ '<i>for</i> '.Service::find($pawaits->service_id)->service }}
          {{ '<i>Date and time</i> '.$pawaits->time_in }}
        </a>    
      </td>
    </tr>
    @empty
    <tr><td colspan="2">No patients waiting</td></tr>
    @endforelse
  </tbody>
  </table>
  <hr />
  <!--<table class="table table-bordered table-condensed">
  <thead class="dash_head">
    <tr><th>In Process</th></tr>
  </thead>
  <tbody>
    <tr>
      <td>--</td>
    </tr>
  </tbody>
  </table>
 <hr />-->
 <table class="table table-bordered table-condensed">
  <thead class="dash_head">
    <tr><th colspan="2">For Billing</th></tr>
  </thead>
  <tbody>
    @forelse($for_billing as $for_billing)
    <tr>
      <td>{{ Patient::fullName($for_billing->patient_id) }}
          <span class="pull-right"><a href="{{ action('billing.details', array($for_billing->id)) }}" class="btn btn-mini">Details</a></span>
      </td>
    </tr>
    @empty
    <tr><td colspan="2">No outstanding item for billing.</td></tr>
    @endforelse
  </tbody>
  </table>

<!-- Hidden Modal -->
<div id="myModalCancel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  {{ Form::open(action('patientawait.cancel')) }}
  <div class="modal-body">
    {{ Form::token() }}
    <input type="hidden" name="await_id"> 
    <h4>Are you sure you want to cancel this appointment?</h4>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Continue</button>
  </div>
  {{ Form::close() }}
</div>

@endsection

@section('styles')
@parent
<style>
.li-none {
  list-style: none;
}
</style>
@endsection

@section('scripts')
@parent
<script>
$(function(){
  $('.pawaits-cancel').click(function(){
      var idval = this.id;
      $('[name=await_id]').val(idval);
  });
});
</script>
@endsection
