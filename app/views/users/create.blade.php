@extends('layouts.main')

@section('main')
@include ('layouts.userlayouts.usernav')
<h1 class="page-header">User <small>{{ isset($user) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@if(isset($user))
{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('route' => 'user.store', 'class' => 'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('username', 'Username', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password', 'New Password', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::password('password', Input::old('password'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<!-- <div class="form-group">
		{{ Form::label('re-password', 'Re-enter Password', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('re-password', Input::old('password'), array('class' => 'form-control')) }}			
		</div>
	</div> -->
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</div>
	

{{ Form::close() }}


@stop