@extends('layout/nurseLayout')
@section('css')
<link href="{{asset('css/nurse.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'searchPatientProfileByNurse')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ค้นหาผู้ป่วย</h3>
  </div>
  <div class="panel-body">
    <div id="searchPatient">
      <div class="form-group row">
        <div class="col-xs-12">{!! Form::label('patient', 'กรอกชื่อหรือรหัสผู้ป่วย'); !!}</div><br>
        <div class="col-xs-3">{!! Form::text('patient', '', ['class' => 'form-control', 'placeholder' => 'ณภัทร หรือ 12345678']) !!}
          @if( $errors->has('patient') )<br>
          <p class="text-danger"> {{ $errors->first('patient') }} </p> 
          @endif
        </div>
        <div class="col-xs-1">{!! Form::button('ค้นหา', ['class' => 'btn btn-info']) !!}</div>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop