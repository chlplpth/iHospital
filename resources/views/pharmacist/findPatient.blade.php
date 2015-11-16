@extends('layout/pharmacistLayout')
@section('css')
<link href="css/pharmacist.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">ค้นหาผู้ป่วย</h3>
  		</div>
  		<div class="panel-body">
    		
    		{!! Form::label('id', 'รหัสผู้ป่วย'); !!} &nbsp
    		{!! Form::text('id', '', ["class" => "form-control"]) !!} <br>

  			{!! Form::label('name', 'ชื่อผู้ป่วย'); !!} &nbsp
    		{!! Form::text('name', '', ["class" => "form-control"]) !!} <br>

        {!! Form::label('lastname', 'นามสกุลผู้ป่วย'); !!} &nbsp
        {!! Form::text('lastname', '', ["class" => "form-control"]) !!} <br>
    		
    		<br>
    		{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop