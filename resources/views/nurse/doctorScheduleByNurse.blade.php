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
      <div class="panel-body">
        <form role="form">
          <div class="form-group row">
            <div class="col-xs-2">{!! Form::label('name', 'กรอกชื่อหรือรหัสแพทย์'); !!}</div>
          </div>
          <div class="form-group row">
            <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}</div>
            <div class="col-xs-9">{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}</div>
          </div>
          <div class="form-group row">
            <div class="col-xs-12"><h1>ตาราง ยังไม่ได้คิด ปฏิทิน?</h1></div>
          </div>
        </form>
      </div>
  </div>

	{!! Form::close() !!}
@stop