@if(isset($donation) && (isset($included)==false))
{{ Form::model($donation, array('route' => array('donation.update', $donation->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}
@else
{{ Form::open(array('route' => 'donation.store', 'class' => 'form-horizontal', 'name' => 'create-donation')) }}
@endif

	<div class="form-group">
		{{ Form::label('donor_id', 'Donor', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('donor_id', $donors, Input::old('donor_id'), array('class' => 'form-control')) }}			
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
			<button class="btn btn-primary {{ (isset($included)) ? 'hidden' : '' }}" type="submit">Submit</button>
		</div>
	</div>
	

{{ Form::close() }}