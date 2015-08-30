@extends('layouts.main')

@section('main')
@include ('layouts.donorlayouts.donornav')
<h1 class="page-header">Send <small>Blood Request Alert</small></h1>

@include('layouts.partials.messages')

{{ Form::open(array('action' => 'DonorController@postAlert', 'class' => 'form-horizontal', 'name' => 'send-alerts')) }}

	<div class="form-group">
		{{ Form::label('blood_group_id', 'Blood Group', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('blood_group_id', $blood_groups, Input::old('blood_group_id'), array('class' => 'form-control')) }}			
		</div>
	</div>

	<div class="form-group donors-list hidden">
		{{ Form::label('donors', 'Donors', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			<table class="table table-striped">
				<thead>
					<tr>
						<th width="10%">&nbsp;</th>
						<th width="60%">Name</th>
						<th>Last Donated Date</th>
					</tr>
				</thead>
				<tbody>

		     </tbody>
			</table>
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('message', 'Message', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::textarea('message', Input::old('message'), array('class' => 'form-control')) }}			
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</div>

{{ Form::close() }}

@stop