<table class="table table-striped">
	<thead>
		<tr>
			<!-- <th width="10%">&nbsp;</th> -->
			<th width="40%">Donor</th>
			<th width="30%">Item</th>
			<th width="10%">Quantity</th>
			<th width="20%">Donated On</th>
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
					<!-- <td>{{ $donation->product->category->name }}</td> -->
					<td>{{ $donation->product->category->name }} - {{ $donation->product->name }}</td>
					<td>{{ $donation->quantity }}</td>
					<!-- <td>{{ $donation->location->name_with_code }}</td> -->
					<td>{{ $donation->donated_at }}</td>
					<td class="text-center">
						<a href="#" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete this?');"></a>
					</td>
				</tr>
			
		@endforeach
		
		@if(count($donations) == 0)
		<tr>
			<td colspan="5">No matching donations found!</td>
		</tr>
		@endif

	</tbody>
</table>