@extends('layouts.main')

@section('main')
@include ('layouts.productlayouts.productnav')
<h1 class="page-header">Product <small>{{ isset($product) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@if(isset($product))
{{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('route' => 'product.store', 'class' => 'form-horizontal')) }}
@endif

	<div class="form-group">
		{{ Form::label('name', 'Product Name', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}			
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('validity_period', 'Validity Period', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::text('validity_period', Input::old('validity_period'), array('class' => 'form-control')) }}			
		</div>
	</div>
	
	<div class="form-group">
		{{ Form::label('category_id', 'Product Category', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('category_id', $categories, Input::old('category_id'), array('class' => 'form-control')) }}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('uom', 'Product UOM', array('class' => 'col-sm-3 control-label ')) }}
		<div class="col-sm-7">
			{{ Form::text('uom', Input::old('uom'), array('class' => 'form-control')) }}			
		</div>
	</div>

	<div class="form-group">
		{{ Form::label('mil', 'Minimum Inventory Level (MIL)', array('class' => 'col-sm-3 control-label ')) }}
		<div class="col-sm-7">
			{{ Form::text('mil', Input::old('mil'), array('class' => 'form-control')) }}			
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-7">
			<button class="btn btn-primary" type="submit">Submit</button>
			@if(isset($product))
			<!-- {{ Form::button('Back', array('class' =>'btn btn-warning')) }}	 -->
			<button class="btn btn-warning" type="button" onclick="history.go(-1);">Back</button>
			<button class="btn btn-warning" type="button" onclick="javascript:window.location.href='/bloodbank/public'">Home</button>
			@endif
		</div>
	</div>


{{ Form::close() }}


@stop