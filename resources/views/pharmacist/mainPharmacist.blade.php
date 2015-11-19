@extends('layout/pharmacistLayout')

@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<h1>Hello Pharmacist</h1>

	{!! Form::close() !!}
@stop