@extends('layouts.main')

@section('main')
<h1 class="page-header">Locations <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Code</th>
				<th>Name</th>
				<th>Type</th>
				<th>Parent Location</th>
				<th width="10%" class="text-center">Edit</th>
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($locations as $i => $location)
			<tr>
				<td>{{ $location->code }}</td>
				<td>{{ $location->name }}</td>
				<td>{{ $location->type->name }}</td>
				<td>{{ $location->parent_name }}</td>
				<td class="text-center">
					<a href="{{ route('location.edit', $location->id) }}" class="glyphicon glyphicon-edit"></a>
				</td>
				<td class="text-center">
					{{ Form::open(array('route' => array('location.destroy', $location->id), 'method' => 'DELETE', 'class' => 'form-horizontal')) }}
						<button type="submit" style="padding: 0px;" class="btn btn-link glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></button>
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
			
			@if(count($locations) == 0)
			<tr>
				<td colspan="7">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>

	{{ $locations->links() }}

</div>
@stop