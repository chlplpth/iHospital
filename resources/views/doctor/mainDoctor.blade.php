@extends('layout/doctorLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<h1>mainDoctor</h1>

	{!! Form::close() !!}
@stop