@extends('layouts.main')

@section('main')
<h1 class="page-header">Donations <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Donor</th>
				<th>Product Category</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Location</th>
				<th>Donated On</th>
				<!-- <th width="10%" class="text-center">Edit</th> -->
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($donations as $i => $donation)
			<tr>
				<td>
					@if($donation->donor->trashed())
					{{ $donation->donor->name }}
					@else
					<a href="#">
					{{ $donation->donor->name }}
					</a>
					@endif
				</td>
				<td>{{ $donation->product->category->name }}</td>
				<td>{{ $donation->product->name }}</td>
				<td>{{ $donation->quantity }}</td>
				<td>{{ $donation->location->name_with_code }}</td>
				<td>{{ $donation->donated_at }}</td>
				<!-- <td class="text-center">
					<a href="#" class="glyphicon glyphicon-eye"></a>
				</td> -->
				<!-- <td class="text-center">
					<a href="{{ route('donor.edit', $donation->id) }}" class="glyphicon glyphicon-edit"></a>
				</td> -->
				<td class="text-center">
					<a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></a>
				</td>
			</tr>
			@endforeach
			
			@if(count($donations) == 0)
			<tr>
				<td colspan="5">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>

	{{ $donations->links() }}

</div>
@stop