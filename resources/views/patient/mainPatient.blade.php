@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')
	<h1>ยินดีตอนรับคุณ {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
@stop