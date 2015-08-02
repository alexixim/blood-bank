<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
		<li><a href="#">Dashboard</a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li class="heading">Donors</li>
		<li><a href="{{ route('donor.create') }}">Create Donor</a></li>
		<li><a href="{{ route('donor.index') }}">List Donors</a></li>
		<li><a href="{{ action('DonorController@getAlert') }}">Send Blood Req. Alert</a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li class="heading">Donations</li>
		<li><a href="{{ route('donation.create') }}">Create Donation</a></li>
		<li><a href="{{ route('donation.index') }}">List Donations</a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li class="heading">Products</li>
		<li><a href="{{ route('product.index') }}">List Products</a></li>
	</ul>
</div>