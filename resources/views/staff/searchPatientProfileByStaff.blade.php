@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ค้นหาผู้ป่วย</h3>
      </div>
      <div class="panel-body">
        <form role="form">
          <div class="form-group row">
            <div class="col-xs-12">{!! Form::label('patient', 'กรอกชื่อหรือรหัสผู้ป่วย'); !!}</div>
            <div class="col-xs-3">{!! Form::text('patient', '', ["class" => "form-control"]) !!}</div>
            <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}</div>
          </div>
        </form>
      </div>
  </div>

	{!! Form::close() !!}
@stop