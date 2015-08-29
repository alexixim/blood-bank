<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">
	<title>One Blood</title>
	<link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ url('/css/dashboard.css') }}" rel="stylesheet">
	<link href="{{ url('/css/styles.css') }}" rel="stylesheet">
</head>
<body>
	@include('layouts.partials.navbar')
	<div class="container-fluid">
		<div class="row">
			@include('layouts.partials.sidebar')
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
				@yield('main')
			</div>
		</div>
	</div>
</body>
<script src="{{ url('/js/jquery.1.9.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script src="{{ url('/js/main.js') }}"></script>
@yield('scripts')
</html>
