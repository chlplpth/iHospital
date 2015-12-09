@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
{!! HTML::script('js/staff.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/manageStaffByStaff')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>
  </div>
  <div class="panel-body">
    <div id="manageStaffForm">
      <span class ="bold">ชื่อเจ้าหน้าที่&nbsp;&nbsp;</span>
      {!! Form::text('name', '', ['class'=>'textbox', 'placeholder'=>'ชื่อเจ้าหน้าที่']);!!}
      {!! Form::submit('ค้นหา', ["class" => "btn btn-info","id" =>"searchButton"]) !!}
    </div>
  </div>
</div>
{!! Form::close() !!}
@stop