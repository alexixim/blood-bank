<div class="col-sm-3 col-md-2 sidebar">


	<ul class="nav nav-pills nav-stacked">
	  <li role="presentation" class="active"><a href="#">Dashboard</a></li>
	  <li role="presentation"><a href="{{ route('donor.create') }}">Donors</a></li>
	  <li role="presentation"><a href="{{ route('donation.create') }}">Donations</a></li>
	  <li role="presentation"><a href="{{ route('product.create') }}">Items</a></li>
	  <li role="presentation"><a href="{{ route('location.create') }}">Locations</a></li>
	  <li role="presentation"><a href="{{ route('donation.getMobile') }}">Mobile Campaign</a></li>
	  <li role="presentation"><a href="{{ route('adjustment.create') }}">Adjustments</a></li>
	  <li role="presentation"><a href="{{ route('ui.index') }}">Reports</a></li>
	</ul>


	<!-- <ul class="nav nav-sidebar">
		<li><a href="#">Dashboard</a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li class="heading"><a href="{{ route('donor.create') }}">Donors</a></li>
		<li class="heading"><a href="{{ route('donation.index') }}">Donations</a></li>
		<li class="heading"><a href="{{ route('product.index') }}">Products</a></li>
		<li class="heading"><a href="{{ route('location.create') }}">Locations</a></li>
		<li class="heading"><a href="{{  action('DonationController@getMobile') }}">Mobile Campaign</a></li>
	</ul>

	<ul class="nav nav-sidebar">
		<li class="heading">Users</li>
		<li><a href="{{ route('user.create') }}">Create Users</a></li>
		<li><a href="{{ route('user.index') }}">List Users</a></li>
	</ul>
	<ul class="nav nav-sidebar">
		<li class="heading">Mobile Campaigns</li>
		<li><a href="{{ action('DonationController@getMobile') }}">Mobile Campaign</a></li>
		<li><a href="{{ route('user.index') }}">View Campaign details</a></li>
	</ul> -->
</div>
