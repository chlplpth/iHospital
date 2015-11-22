@extends('layout/nurseLayout')
@section('css')
<link href="css/nurse.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ค้นหาตารางการออกตรวจ</h3>
      </div>
      <div class="panel-body" style="margin-left:40px; margin-top:2%">
        <form role="form">
          <div class="form-group row">
            <div class="col-xs-12">{!! Form::label('doctor', 'ชื่อหรือรหัสแพทย์'); !!}</div>
            <div class="col-xs-3">{!! Form::text('doctor', '', ["class" => "form-control", 'placeholder'=>'กรอกชื่อหรือรหัสแพทย์']) !!}</div>
            <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
          </div>
          <div class="form-group row">
            <div class="col-xs-12"><h1>ตาราง ยังไม่ได้คิด ปฏิทิน?</h1></div>
          </div>
        </form>
      </div>
  </div>

	{!! Form::close() !!}
@stop