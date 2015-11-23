@extends('layout/unregisteredLayout')
@section('css')
<link href="{{asset('css/forgetAndChangePassword.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">เปลี่ยนรหัสผ่าน</h3>
	</div>
	<div class="panel-body">
		<br>
		<div class= "row">
			<div class="col-md-1">
			</div>
			<div class="col-md-4" >
				{!!Form::label('newPassword','รหัสผ่านใหม่');!!}&nbsp
				{!!Form::text('newPassword','',['class'=>'textbox','placeholder'=>'รหัสผ่านใหม่']);!!}
			</div>
			<div class="col-md-7" >
				{!!Form::label('reNewPassword','ยืนยันรหัสผ่านใหม่');!!}&nbsp
				{!!Form::text('reNewPassword','',['class'=>'textbox','placeholder'=>'ยืนยันรหัสผ่านใหม่']);!!}
			</div>
		</div><br><br>
		<div class= "row">
			<div class="col-md-8">
			</div>
			<div class="col-md-4" >
				{!!Form::button('ยืนยัน',['class'=>'btn btn-success']);!!}
			</div>
		</div>
		
	</div>
</div>
{!! Form::close() !!}
@stop