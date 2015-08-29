@extends('layouts.main')

@section('main')
@include ('layouts.adjustmentslayouts.adjustmentnav')
<h1 class="page-header">Adjustment <small>Create</small></h1>

@include('layouts.partials.messages')


{{ Form::open(array('route' => 'adjustment.store', 'class' => 'form-horizontal')) }} 
	
	<div class="form-group">
		{{ Form::label('type', 'Adjustment Type', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('type', $type, Input::old(''), array('class' => 'form-control') ) }}			
		</div>
	</div> 

	<div class="form-group">
		{{ Form::label('location_id', 'Location', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('location_id', $locations, Input::old(''), array('class' => 'form-control') ) }}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('product_id', 'Select Product', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('product_id', $products, Input::old(''), array('class' => 'form-control') ) }}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('quantity', 'Product Quantity', array('class' => 'col-sm-3 control-label required ')) }}
		<div class="col-sm-7">
			{{ Form::text('quantity', $quantity, array('class' => 'form-control') ) }}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('adjustment_date', 'Adjustment Date', array('class' => 'col-sm-3 control-label required ')) }}
		<div class="col-sm-7">
			{{ Form::text('adjustment_date', $today, array('class' => 'form-control', 'readonly' => 'readonly') )}}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('description', 'Description', array('class' => 'col-sm-3 control-label ')) }}
		<div class="col-sm-7">
			{{ Form::textarea('description', $description, array('class' => 'form-control')) }}			
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Save Adjustment</button>
		</div>
	</div>

{{ Form::close() }}


@stop 