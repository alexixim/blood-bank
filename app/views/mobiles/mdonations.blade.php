@extends('layouts.main')

@section('main')
@include ('layouts.mobilelayouts.mobilenav')
<h1 class="page-header">Mobile Campaigns</h1>

@include('layouts.partials.messages')

{{ Form::open(array('action' => 'DonationController@postMobile', 'class' => 'form-horizontal', 'name' => 'mobiles')) }}

	<div class="form-group">
		{{ Form::label('mobile_campaign_id', 'Mobile Campaign Location', array('class' => 'col-sm-3 control-label required')) }}
		<div class="col-sm-7">
			{{ Form::select('mobile_id', $mobiles, Input::old('mobile_id'), array('class' => 'form-control')) }}
				
		</div>
	</div>

	<div class="form-group donation-list">
		<div class="table-container">
			@include('mobiles.mdonations-table')
		</div>
	</div>

	<div>
		<table class="table">
			<tbody>
					<tr>
						<td width="70%"></td>
						<td>
							<p>
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#createDonation">Create Donation</button>&nbsp;
								<button class="btn btn-primary" type="button">Transfer</button>&nbsp;
								<button class="btn btn-primary" type="submit">Submit</button>
							</p>
						<!-- <p>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
								<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#createDonation">Create Donation</button>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
								<button class="btn btn-primary" type="button">Transfer</button>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-7">
								<button class="btn btn-primary" type="submit">Submit</button>
								</div>
							</div>
						</p> -->
						</td>
					</tr>
			</tbody>
		</table>



	</div>

{{ Form::close() }}

<!-- Modal -->
<div class="modal fade" id="createDonation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Donation</h4>
      </div>
      <div class="modal-body">
	      	<div class="alert alert-danger hidden" role="alert"></div>
	      	<div class="alert alert-success hidden" role="alert"></div>
	      	@include('donations.form', array('included' => true))
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create-donation-btn">Create Donation</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(function(){

	$("form[name='mobiles'] select[name='mobile_id']").change(function(){
		var location_id = $(this).val();

		$.ajax({
			url: '/bloodbank/public/donation/mobile/' + location_id,
			success: function(res){
				$('.donation-list .table-container').html(res);
			}
		})
	});
});
</script>
@stop