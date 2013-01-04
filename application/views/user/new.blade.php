@layout('layouts.main')

@section('breadcrumb')
  @parent
  <li><a href="{{ URL::to_action('user') }}">Users</a> <span class="divider">/</span></li>
  <li class="active">New</li>
@endsection

@section('content')

<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register New User</legend>
    </div>
    <div class="control-group {{ $errors->has('name') ? 'error' : '' }} ">
      <!-- Name -->
      <label class="control-label"  for="name">Name</label>
      <div class="controls">
        <input type="text" id="name" value="{{ Input::old('name') }}" name="name" placeholder="" class="input-xlarge">
        <span class="help-inline">{{ $errors->first('name') }}</span>
        <p class="help-block">Please provide your Name</p>        
      </div>
    </div>

    <div class="control-group {{ $errors->has('username') ? 'error' : '' }} ">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" value="{{ Input::old('username') }}" name="username" placeholder="" class="input-xlarge">
        <span class="help-inline">{{ $errors->first('username') }}</span>
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
      </div>
    </div>
 
    <div class="control-group {{ $errors->has('email') ? 'error' : '' }} ">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" value="{{ Input::old('email') }}" name="email" placeholder="" class="input-xlarge">
        <span class="help-inline">{{ $errors->first('email') }}</span>
        <p class="help-block">Please provide your E-mail</p>
      </div>
    </div>
 
    <div class="control-group {{ $errors->has('password') ? 'error' : '' }}">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
        <span class="help-inline">{{ $errors->first('password') }}</span>
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirmation">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Register</button>
        &nbsp;<a href="{{ action('user') }}" class="btn">Cancel</a>
      </div>
    </div>
  </fieldset>
</form>

@endsection