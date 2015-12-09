@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPrescriptionHistory')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">บันทึกประวัติการจ่ายยา</h3>
  </div>
  <div class="panel-body">
    <div id="recordPrescriptionForm">
      <span class ="bold">รหัสผู้ป่วย&nbsp;&nbsp;</span>
      {!! Form::text('HN', '', ['class'=>'textbox', 'placeholder'=>'รหัสผู้ป่วย']);!!}
      {!! Form::submit('ค้นหา', ["class" => "btn btn-info","id" =>"searchButton"]) !!}
    </div>
  </div>
</div>
{!! Form::close() !!}
@stop