@extends('layouts.scaffold')

@section('main')

<h1>Show User</h1>

<p>{{ link_to_route('users.index', 'Return to All users', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
				<th>Password</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Fullname</th>
				<th>Dateofbirth</th>
				<th>Ssn</th>
				<th>Gender</th>
				<th>Photourl</th>
				<th>Email</th>
				<th>Usertype</th>
				<th>Familydocotorname</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $user->username }}}</td>
					<td>{{{ $user->password }}}</td>
					<td>{{{ $user->address }}}</td>
					<td>{{{ $user->phone }}}</td>
					<td>{{{ $user->fullname }}}</td>
					<td>{{{ $user->dateofbirth }}}</td>
					<td>{{{ $user->ssn }}}</td>
					<td>{{{ $user->gender }}}</td>
					<td>{{{ $user->photourl }}}</td>
					<td>{{{ $user->email }}}</td>
					<td>{{{ $user->usertype }}}</td>
					<td>{{{ $user->familydocotorname }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
