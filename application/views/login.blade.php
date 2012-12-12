@layout('layouts.mainlogin')

@section('content')

	<hr/>
	<div class="row">
		<div class="eight columns panel">
			<h2>Login</h2>
			{{ Form::open('login', 'POST',array('id' => 'submit-form')) }}
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username') }}
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password') }}
				{{ Form::submit('Login', array('class' => 'button')) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection