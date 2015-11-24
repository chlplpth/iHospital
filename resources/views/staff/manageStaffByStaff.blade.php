@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/manageStaffByStaff')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>

  </div>
  <div class="panel-body">
    <div id="manageStaffForm">
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('staff', 'ชื่อหรือรหัสบุคลากร'); !!}</div>
        <div class="col-xs-3">{!! Form::text('staff', '', ['class' => 'form-control', 'placeholder'=>'กรอกชื่อหรือรหัสบุคลากร']) !!}</div>
        <div class="col-xs-1">{!! Form::submit('ค้นหา', ['class' => 'btn btn-info']) !!}</div>

      </div>
    </div>
  </div>


{!! Form::close() !!}
@stop