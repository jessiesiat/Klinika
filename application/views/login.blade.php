@layout('layouts.mainlogin')

@section('content')

	<div class="row">
		<div class="six columns">
		<h3 class="prod_name"><a href="/laravel">Klinika</a>  <small>A Clinic Management Software</small></h3>
		</div>
	</div>
	<div class="row">
		<div class="six columns offset-by-three pan">
			<h5>Please enter your valid Username/Password:</h5>

			@if(Session::get('error'))
				<div class="alert alert-box">
					Invalid Login
					<a href="" class="close">&times;</a>
				</div>
			@endif

			{{ Form::open('login', 'POST',array('id' => 'submit-form')) }}
				{{ Form::label('username', 'Username') }}
				{{ Form::text('username', Input::old('username'), array('placeholder' => 'Your username')) }}
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('placeholder' => 'Your password')) }}
				{{ Form::submit('Login', array('class' => 'button')) }}
			{{ Form::close() }}
		</div>
	</div>

@endsection

@section('styles')
@parent
<style>
body {
	background: url('img/doctors.jpg') no-repeat 50px 90px;
}
.pan {
	background: #f2f2f2;
	top: 25px;
	left: 20px;
}
h3 {
  border-bottom: 3px solid #dc8b00;
}
h3.prod_name a {
  color: #dc9b00;
  letter-spacing: 1px;
  font-size: 35px;
}

h3.prod_name a:hover {
  text-decoration: none;
}
</style>
@endsection