@layout('layouts.main')

@section('content')

	<div class="well">
		@if(Session::has('errors'))
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">×</a>
				{{ $errors->first('name') }}
				{{ $errors->first('password') }}
			</div>
		@endif
			<h3 data-icon="&#x22;"> Register New User</h3>
			{{ Form::open('register') }}
				{{ Form::label('name', 'Name') }}
				{{ Form::text('name', Input::old('name')) }}
				{{ Form::label('email', 'Email') }}
				{{ Form::text('email', Input::old('email')) }}
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username', Input::old('username')) }}
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password') }}
				{{ Form::label('password_confirmation', 'Confirm Password') }}
				{{ Form::password('password_confirmation') }}
				<br/>
				{{ Form::submit('Register', array('class' => 'btn btn-primary')) }}
			{{ Form::close() }}
	</div>

@endsection