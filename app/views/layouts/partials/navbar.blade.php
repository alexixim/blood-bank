<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Blood Bank</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown" id="notifi-dd">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i> <span class="glyphicon glyphicon-bell"></span> <span class="badge"></span></a>
					<ul class="notifications dropdown-menu">
						
					</ul>
				</li>
				<!-- <li><a href="#">Settings</a></li> -->
				<!-- <li><a href="#">Profile</a></li> -->
				<li><a href="{{ url('auth/logout') }}">Logout</a></li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
			</form>
		</div>
	</div>
</nav>	