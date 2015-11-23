@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">ตารางการออกตรวจ</h3>
    </div>
    <div class="panel-body" style="margin-top: 2%; margin-left: 40px;">
      <form role="form">
        <div class="form-group row">
          <div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
          <div class="col-xs-2" id="staffLabel">{!! Form::label('id', '12345678'); !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
          <div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
          <div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
        </div>
        <div class="form-group row">
        <div class="col-xs-2" id="staffLabel">{!! Form::label('day', 'วันออกตรวจ'); !!}</div>
        <div class="col-xs-7">
          <div id="calendar" data-date-language="th-th"></div>
        </div>
      </div>
      </form>
      <script type="text/javascript">
      // When the document is ready
      $(document).ready(function () {
        $('#calendar').datepicker();
      });
      </script>
      </div>
  </div>

	{!! Form::close() !!}
@stop