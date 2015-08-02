@if(count($errors))
	<div class="alert alert-danger" role="alert">
	@foreach($errors->all() as $err)
	<p>{{ $err }}<br /></p>
	@endforeach
	</div>
@endif

@if($message = Session::get('success'))
	<div class="alert alert-success" role="alert">
	    <p>{{ $message }}</p>
	</div>
@endif