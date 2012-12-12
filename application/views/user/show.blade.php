@layout('layouts.main')

@section('content')

    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#info">Basic Info</a></li>
      <li><a href="#passwd">Password</a></li>
    </ul>
     
    <div class="tab-content">
      <div class="tab-pane active" id="info">
        <h4>{{ $user->name }}</h4>
        <p>Email: {{ $user->email }} </p>
        <p>Username: {{ $user->username }} </p>
        <p>Registered: {{ $user->created_at }} </p>
      </div>
      <div class="tab-pane" id="passwd">
        <h5>Change Password</h5>
        {{ Form::open(action('/'), 'POST', array('class' => 'form-horizontal')) }}
            <div class="control-group">
                {{ Form::label('password', 'Type New Password', array('class' => 'control-label')) }}
                <div class="controls">
                  {{ Form::text('password') }}
                  <span class="help-inline">{{ $errors->first('supplier') }}</span>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}      
                </div>
            </div>
            
        {{ Form::close() }}
      </div>
    </div>
	
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