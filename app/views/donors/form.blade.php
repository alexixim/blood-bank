@if(isset($donor))
{{ Form::model($donor, array('route' => array('donor.update', $donor->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('route' => 'donor.store', 'class' => 'form-horizontal', 'name' => 'create-donor')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Name', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}		
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('dob', 'Date of Birth', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('dob', Input::old('dob'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('nic', 'National ID', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('nic', Input::old('nic'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('gender', 'Gender', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('gender', array('', 'Male', 'Female'), Input::old('gender'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('telephone', 'Mobile Number', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('telephone', Input::old('telephone'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('blood_group_id', 'Blood Group', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('blood_group_id', $blood_groups, Input::old('blood_group_id'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('address', 'Address', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::text('address', Input::old('address'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('details', 'Details', array('class' => 'col-sm-3 control-label')) }}
		<div class="col-sm-7">
			{{ Form::textarea('details', Input::old('details'), array('class' => 'form-control')) }}			
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary {{ (isset($included)) ? 'hidden' : '' }}" type="submit">Submit</button>
		</div>
	</div>

{{ Form::close() }}