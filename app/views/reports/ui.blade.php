@extends('layouts.main')

@section('main')
@include ('layouts.reportlayouts.uinav')
<h1 class="page-header">Reports</h1>

<br><br>

	<div class="form-group" style="text-align: left;">
		<div class="col-sm-offset-2 col-sm-7">
			{{ Form::label('', 'Donor Details', array('class' => 'col-sm-6 control-label')) }}
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('ReportController@getDonorDetails') }}'" value='View'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('DownloadController@getDonorDetails') }}'" value='Download'>
		</div>
	</div>


<br><br><br><br>

	<div class="form-group" style="text-align: left;">
		<div class="col-sm-offset-2 col-sm-7">
			{{ Form::label('', 'Donation Details', array('class' => 'col-sm-6 control-label')) }}
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('ReportController@getDonationDetails') }}'" value='View'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('DownloadController@getDonationDetails') }}'" value='Download'>
		</div>
	</div>

<br><br><br><br>

	<div class="form-group" style="text-align: left;">
		<div class="col-sm-offset-2 col-sm-7">
			{{ Form::label('', 'Product Details', array('class' => 'col-sm-6 control-label')) }}
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('ReportController@getProductDetails') }}'" value='View'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('DownloadController@getProductDetails') }}'" value='Download'>
		</div>
	</div>	

<br><br><br><br>

	<div class="form-group" style="text-align: left;">
		<div class="col-sm-offset-2 col-sm-7">
			{{ Form::label('', 'Location Details', array('class' => 'col-sm-6 control-label')) }}
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('ReportController@getLocationDetails') }}'" value='View'>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<input class="btn btn-primary" type=button onClick="location.href='{{ action('DownloadController@getLocationDetails') }}'" value='Download'>
		</div>
	</div>	

@stop