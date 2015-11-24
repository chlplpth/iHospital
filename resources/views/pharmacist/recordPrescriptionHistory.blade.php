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
  
  <div class="panel-body" style="margin-left:40px;">
    <form role="form">
          <div class="form-group row">
            <div class="col-xs-12">{!! Form::label('patient', 'กรอกชื่อหรือรหัสผู้ป่วย'); !!}</div>
            <div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อผู้ป่วย" class="form-control"></select></div>
            
            </div>
          </div>
        </form>
          
            @if( $errors->has('patient') )
            <p class="text-danger"> {{ $errors->first('patient') }} </p> 
            @endif
          
  </div>
</div>

{!! Form::close() !!}
@stop