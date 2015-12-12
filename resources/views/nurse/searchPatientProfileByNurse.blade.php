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
    <div id ="searchPatientForm">
      <div>{!! Form::label('patient', 'กรอกชื่อหรือนามสกุลผู้ป่วยเพื่อค้นหา'); !!}</div>
      <div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือนามสกุลผู้ป่วย" class="form-control"></select></div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/patientProfileByNurse';
</script>