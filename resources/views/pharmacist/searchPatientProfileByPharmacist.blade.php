@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'searchPatientProfileByPharmacist')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ค้นหาผู้ป่วย</h3>
  </div>
  <div class="panel-body" style="margin-left:40px; margin-top:2%;">
    <div role="searchPatientForm">
      <span class ="bold">รหัสผู้ป่วย&nbsp;&nbsp;</span>
      {!! Form::text('HN', '', ['class'=>'textbox', 'placeholder'=>'รหัสผู้ป่วย']);!!}
      {!! Form::submit('ค้นหา', ["class" => "btn btn-info","id" =>"searchButton"]) !!}
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop