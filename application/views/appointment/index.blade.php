@layout('layouts.main')

@section('breadcrumb')
	@parent
	<li class="active">Appointment</li>
@endsection

@section('content')

	<div id="middle-bar-small"> Appointments </div>
	<table class="table table-condensed table-striped">
	<thead>
		<tr><th>Patient</th><th>Date and Time</th><th>Status</th><th>Notes</th><th></th></tr>
	</thead>
	<tbody>
		@forelse($appointments as $row)
		<tr>
			<td>{{ $row->patient->f_name.' '.$row->patient->l_name }}</td>
			<td>{{ $row->date_time }}</td>
			<td>
				@if($row->status == 0) <span class="label">Active</span>
				@elseif($row->status == 1) <span class="label label-important">Is In</span>
				@else
					{{ ($row->status == 2) ? '<span class="label label-success">Completed</span>' : '<span class="label label-inverse">Cancelled</span>'  }}
				@endif
			</td>
			<td>{{ $row->notes }}</td>
			<td>
				<span class="pull-right">
				<?php 
					$date_today = new DateTime(); 
					$appointment_date = new DateTime($row->date_time);
				?>
				@if($row->status == 0)
					<!-- Active -->
					@if($date_today->format('Y-m-d') == $appointment_date->format('Y-m-d'))
					<a href="{{ action('appointment.isIn', array($row->id, $row->patient->f_name)) }}" class="btn btn-mini btn-primary">is in</a> 
					@endif
					<a href="{{ action('appointment.reSchedule', array($row->id)) }}" class="btn btn-mini btn-primary">re-schedule</a> 
					<a href="#myModalCancel" role="button" data-toggle="modal" class="btn btn-mini apt-cancel">Cancel</a>
				@elseif($row->status == 1)
					<!-- Is In -->
					<a href="{{ action('appointment.reSchedule', array($row->id)) }}" class="btn btn-mini btn-primary">re-schedule</a> 
					<a href="#myModalCancel" id="{{ $row->id }}" role="button" data-toggle="modal" class="btn btn-mini apt-cancel">Cancel</a>				
				@else
					<!--<a href="{{ action('appointment.complete', array($row->id)) }}" class="btn btn-mini btn-primary">complete</a> 
					<a href="#myModalCancel" id="{{ $row->id }}" role="button" data-toggle="modal" class="btn btn-mini apt-cancel">Cancel</a>-->
				@endif
				</span>
			</td>
		</tr>
		@empty
		<tr><td colspan="6">No appointments found</td></tr>
		@endforelse
	</tbody>
	</table>

<!-- Hidden Modal -->
<div id="myModalCancel" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  {{ Form::open(action('appointment.cancel')) }}
  <div class="modal-body">
  	{{ Form::token() }}
	<input type="hidden" name="appointment_id">	
  	<h4>Are you sure you want to cancel this appointment?</h4>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <button class="btn btn-primary">Continue</button>
  </div>
  {{ Form::close() }}
</div>

@endsection

@section('scripts')
@parent
{{ HTML::script('js/bootstrap/bootstrap-dropdown.js') }}
<script>
$(function(){
	$('.dropdown-toggle').dropdown();

	$('.apt-cancel').click(function(){
    	var idval = this.id;
    	$('[name=appointment_id]').val(idval);
	});
});
</script>
@endsection