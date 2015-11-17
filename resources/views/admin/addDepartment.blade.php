@extends('layout/adminLayout')
@section('css')
<link href="css/admin.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มแผนก</h3>
  		</div>
  		<div class="panel-body">
    		
    		{!! Form::label('id', 'รหัสแผนก'); !!} &nbsp
    		{!! Form::text('id', '', ["class" => "form-control"]) !!} <br>

  			{!! Form::label('name', 'ชื่อแผนก'); !!} &nbsp
    		{!! Form::text('name', '', ["class" => "form-control"]) !!} <br>
    		
    		<br>
    		{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop