@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
@stop
@section('content')
	<h1>ยินดีต้อนรับ {{Auth::user()->name}} {{Auth::user()->surname}}</h1>
@stop