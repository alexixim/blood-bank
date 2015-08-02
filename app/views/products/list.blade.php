@extends('layouts.main')

@section('main')
<h1 class="page-header">Products <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Category</th>
				<th>Quantity</th>
				<th>Donations Count</th>
				<!-- <th width="10%" class="text-center">Edit</th> -->
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $i => $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->category->name }}</td>
				<td>{{ $product->quantity }}</td>
				<td>{{ count($product->donations) }}</td>
				<!-- <td class="text-center">
					<a href="#" class="glyphicon glyphicon-eye"></a>
				</td> -->
				<!-- <td class="text-center">
					<a href="{{ route('donor.edit', $product->id) }}" class="glyphicon glyphicon-edit"></a>
				</td> -->
				<td class="text-center">
					<a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></a>
				</td>
			</tr>
			@endforeach
			
			@if(count($products) == 0)
			<tr>
				<td colspan="4">No matching results found!</td>
			</tr>
			@endif
		</tbody>
	</table>

	{{ $products->links() }}

</div>
@stop