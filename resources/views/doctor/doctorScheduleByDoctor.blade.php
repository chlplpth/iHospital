@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ตารางการออกตรวจ</h3>
      </div>
      <div class="panel-body">
        <form role="form">
          <div class="form-group row">
            <div class="col-xs-12"><h1>ตาราง ยังไม่ได้คิด ปฏิทิน?</h1></div>
          </div>
        </form>
      </div>
  </div>

	{!! Form::close() !!}
@stop