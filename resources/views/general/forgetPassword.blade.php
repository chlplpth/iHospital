@extends('layout/unregisteredLayout')
@section('css')
<link href="css/forgetAndChangePassword.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/forgetPassword')) !!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ลืมรหัสผ่าน</h3>
	</div>
	<div class="panel-body">
		<br>
		<div class= "row">
			<div class="col-md-1">
			</div>
			<div class="col-md-4" >
				{!!Form::label('email','อีเมล');!!}&nbsp
				{!!Form::text('email','',['class'=>'textbox','placeholder'=>'อีเมล']);!!}
			</div>
			<div class="col-md-7" >
				{!!Form::submit('ส่ง',['class'=>'btn btn-warning']);!!}</div>
			</div>
			<br><br>
	</div>
</div>
{!! Form::close() !!}
@stop