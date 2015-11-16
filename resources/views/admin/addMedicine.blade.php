@extends('layout/adminLayout')
@section('css')
<link href="css/admin.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มยา</h3>
  		</div>
  		<div class="panel-body">
    		

  			{!! Form::label('id', 'รหัสยา'); !!} &nbsp
    		{!! Form::text('id', '', ["class" => "form-control"]) !!}
        <br>

        {!! Form::label('name', 'ชื่อยา'); !!} &nbsp
        {!! Form::text('name', '', ["class" => "form-control"]) !!}
        <br>

        {!! Form::label('desc', 'รายละเอียดยา'); !!} &nbsp
        {!! Form::textarea('desc', '', ["class" => "form-control", "rows" => "5"]) !!}
        <br>

    		<br>
    		{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop