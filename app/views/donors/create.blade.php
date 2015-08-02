@extends('layouts.main')

@section('main')
<h1 class="page-header">Donor <small>{{ isset($donor) ? 'Edit' : 'Create' }}</small></h1>

@include('layouts.partials.messages')

@include('donors.form')

@stop