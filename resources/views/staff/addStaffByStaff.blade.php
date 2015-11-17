@extends('layout/staffLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<h1>addStaffByStaff</h1>

	{!! Form::close() !!}
@stop