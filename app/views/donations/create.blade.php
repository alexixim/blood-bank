@extends('layouts.main')

@section('main')
@include ('layouts.donationlayouts.donationnav')
<h1 class="page-header">Donation <small>{{ isset($donation) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@include('donations.form')

@stop