@extends('layout/nurseLayout')
@section('css')
<link href="css/nurse.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">ค้นหาตารางนัดหมาย</h3>
  		</div>
  		<div class="panel-body">
  			{!! Form::label('name', 'กรอกชื่อหรือรหัสแพทย์'); !!} &nbsp
    		{!! Form::text('name', '', ["class" => "form-control"]) !!} <br>
    		{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop