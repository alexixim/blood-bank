@extends('layouts.main')

@section('main')
<h1 class="page-header">Donation <small>{{ isset($donation) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@if(isset($donation))
{{ Form::model($donation, array('route' => array('donation.update', $donation->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('route' => 'donation.store', 'class' => 'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('donor_id', 'Donor', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			<div class="input-group">
				{{ Form::select('donor_id', $donors, Input::old('donor_id'), array('class' => 'form-control')) }}
				<span class="input-group-btn">
					<button class="btn btn-default glyphicon glyphicon-plus" type="button" data-toggle="modal" data-target="#createDonor"></button>
				</span>			
			</div>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('product_id', 'Product', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('product_id', $products, Input::old('product_id'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('quantity', 'Quantity', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('quantity', Input::old('quantity'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('location_id', 'Location', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('location_id', $locations, Input::old('location_id'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('donated_at', 'Donated On', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('donated_at', Input::old('donated_at') ? : $today, array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Submit</button>
		</div>
	</div>

{{ Form::close() }}

<!-- Modal -->
<div class="modal fade" id="createDonor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Donor</h4>
      </div>
      <div class="modal-body">
	      	<div class="alert alert-danger hidden" role="alert"></div>
	      	<div class="alert alert-success hidden" role="alert"></div>
        	@include('donors.form', array('included' => true))
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create-donor-btn">Create Donor</button>
      </div>
    </div>
  </div>
</div>

@stop