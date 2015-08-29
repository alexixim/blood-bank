@extends('layouts.main')

@section('main')
@include ('layouts.locationlayouts.locationnav')
<h1 class="page-header">Location <small>{{ isset($location) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@if(isset($location))
{{ Form::model($location, array('route' => array('location.update', $location->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'name' => 'locations')) }}
@else
{{ Form::open(array('route' => 'location.store', 'class' => 'form-horizontal', 'name' => 'locations')) }}
@endif

	<div class="form-group">
		{{ Form::label('code', 'Code', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('code', Input::old('code'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address', 'Address', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('contact_no', 'Contct No.', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('contact_no', Input::old('contact_no'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('location_type_id', 'Location Type', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('location_type_id', $location_types, Input::old('location_type_id'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group pid">
		{{ Form::label('parent_location_id', 'Parent Location', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::select('parent_location_id', $parent_locations, Input::old('parent_location_id'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group valid-till">
		{{ Form::label('valid_till', 'Valid Till', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('valid_till', Input::old('valid_till'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group org-details">
		{{ Form::label('organizer_details', 'Organizer Details', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::textarea('organizer_details', Input::old('organizer_details'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</div>
	

{{ Form::close() }}


@stop