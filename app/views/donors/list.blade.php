@extends('layouts.main')

@section('main')
<h1 class="page-header">Donors <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>DOB</th>
				<th>Blood Group</th>
				<th>Gender</th>
				<th>Last Donation On</th>
				<!-- <th width="10%" class="text-center">View</th> -->
				<th width="10%" class="text-center">Edit</th>
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($donors as $i => $donor)
			<tr>
				<td>{{ $donor->name }}</td>
				<td>{{ $donor->dob }}</td>
				<td>{{ $donor->blood_group->name }}</td>
				<td>{{ $donor->gender_name }}</td>
				<td>
					<abbr title="{{ (count($donor->donations)) ? $donor->donations->last()->donated_at : '' }}">
						{{ (count($donor->donations)) ? $donor->donations->last()->donated_at->diffForHumans() : '' }}
					</abbr>
				</td>
				<!-- <td class="text-center">
					<a href="#" class="glyphicon glyphicon-eye"></a>
				</td> -->
				<td class="text-center">
					<a href="{{ route('donor.edit', $donor->id) }}" class="glyphicon glyphicon-edit"></a>
				</td>
				<td class="text-center">
					{{ Form::open(array('route' => array('donor.destroy', $donor->id), 'method' => 'DELETE', 'class' => 'form-horizontal')) }}
						<button type="submit" style="padding: 0px;" class="btn btn-link glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></button>
					{{ Form::close() }}
					{{-- <a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></a> --}}
				</td>
			</tr>
			@endforeach
			
			@if(count($donors) == 0)
			<tr>
				<td colspan="7">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>

	{{ $donors->links() }}

</div>
@stop