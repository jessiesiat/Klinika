@layout('layouts.main')

@section('breadcrumb')
    @parent
    <li class="active">Users</li>
@endsection

@section('content')

    <div id="middle-bar-small">
        Manage Users 
        <div class="pull-right btn-bar"><a href="{{ action('user@new') }}" class="btn btn-mini">New User</a></div>
    </div>

    <table class="table table-condensed table-striped">
        <thead>
        	<tr>
        		<th>Name</td><th>Email</th><th>Username</th><th>Date Created</th><th></th>
        	</tr>
        </thead>
        <tbody>
        	@foreach($users as $user)
        	<tr>
        		<td>{{ $user->name }}</td>
        		<td>{{ $user->email }}</td>
        		<td>{{ $user->username }}</td>
                <td>{{ $user->created_at }}</td>
        		<td> <a href="{{ action('user.show', array($user->id)) }}"><i class="icon-pencil"></i></a> </td>
        	</tr>
        	@endforeach
        </tbody>
    </table>
	
@endsection