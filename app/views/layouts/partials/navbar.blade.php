<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div id="navheader" class="navbar-header">
			<a class="navbar-brand" href="#"><img id="logo" src="{{ url('images/logo.png') }}" width="170px" height="45px" alt="Blood Bank"></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown" id="notifi-dd">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i> <span class="glyphicon glyphicon-tint"></span> <span class="badge"></span></a>
					<ul class="notifications dropdown-menu">	
					</ul>
				</li>

				<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"><span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Help</a></li>
		            <li><a href="{{ url('user/index') }}">User Settings</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="{{ url('auth/logout') }}">Logout</a></li>
		          </ul>
		        </li>
			</ul>
			<form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="Search...">
			</form>
		</div>
	</div>
</nav>	