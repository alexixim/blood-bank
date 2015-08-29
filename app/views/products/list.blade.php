@extends('layouts.main')

@section('main')
@include ('layouts.productlayouts.productnav')
<h1 class="page-header">Products <small>List</small></h1>

@include('layouts.partials.messages')

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Category</th>
				<!-- <th>Quantity</th> -->
				<!-- <th>Donations Count</th> -->
				<!-- <th width="10%" class="text-center">Edit</th> -->
				<th class="text-center"> </th>
				<th width="10%" class="text-center">View</th>
				<th width="10%" class="text-center">Edit</th>
				<th width="10%" class="text-center">Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($products as $i => $product)
			<tr>
				<td>{{ $product->name }}</td>
				<td>{{ $product->category->name }}</td>
				
				@if($product->category->name == "Blood")
					<td class="text-center">
					<!-- <a href="#" class="glyphicon glyphicon-tint"></a> -->
					<span class="glyphicon glyphicon-tint" style="color:red">  </span>
					</td>
				@elseif($product->category->name == "General")
					<td class="text-center">
					<!-- <a href="#" class="glyphicon glyphicon-tint"></a> -->
					<span class="glyphicon glyphicon-plus" style="color:green">  </span>
					</td>
				@endif

				<!-- <td>{{ $product->quantity }}</td> -->
				<!-- <td>{{ count($product->donations) }}</td> -->
				<td class="text-center">
					<a href="#" class="glyphicon glyphicon-eye-open"></a>
				</td>
				<td class="text-center">
					<a href="{{ route('product.edit', $product->id) }}" class="glyphicon glyphicon-edit"></a>
				</td>
				<td class="text-center">
					{{ Form::open(array('route' => array('product.destroy', $product->id), 'method' => 'DELETE', 'class' => 'form-horizontal')) }}
						<button type="submit" style="padding: 0px;" class="btn btn-link glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></button>
					{{ Form::close() }}
					<!-- {{-- <a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></a> --}} -->
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