@extends('layouts.main')

@section('main')
@include ('layouts.userlayouts.usernav')
<h1 class="page-header">Users <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
				<th width="10%" class="text-center">Edit</th>
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $i => $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>

				<td class="text-center">
					<a href="{{ route('user.edit', $user->id) }}" class="glyphicon glyphicon-edit"></a>
				</td>
				<td class="text-center">
					{{ Form::open(array('route' => array('user.destroy', $user->id), 'method' => 'DELETE', 'class' => 'form-horizontal')) }}
						<button type="submit" style="padding: 0px;" class="btn btn-link glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></button>
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
			
			@if(count($users) == 0)
			<tr>
				<td colspan="7">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>

	{{ $users->links() }}

</div>
@stop