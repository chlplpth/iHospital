@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/searchPatientProfileByDoctor')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ค้นหาผู้ป่วย</h3>
  </div>
  <div class="panel-body" style="margin-left:40px; margin-top:2%;">
    <div id ="searchPatientForm">


      <div>{!! Form::label('patient', 'กรอกชื่อหรือรหัสผู้ป่วย'); !!}</div>
      <div class="input-group">{!! Form::text('patient', '', ['class' => 'form-control', 'placeholder' => 'ณภัทร หรือ 12345678','id'=>'searchPatientTextbox']) !!}&nbsp;&nbsp;{!! Form::submit('ค้นหา', ['class' => 'btn btn-info','id'=>'searchPatientButton']) !!}
      </div> 

      @if( $errors->has('patient') )
      <p class="text-danger"> {{ $errors->first('patient') }} </p> 
      @endif
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop