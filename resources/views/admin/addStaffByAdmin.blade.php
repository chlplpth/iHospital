@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/addStaffByAdmin')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มบุคลากร</h3>
  </div>
  <div class="panel-body" style="margin-top: 10px; margin-left: 40px;">
    <div class="form-group row">
      <div class="col-xs-1" id="adminLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
      <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control", 'placeholder'=>'ชลัมพล']) !!}
        @if( $errors->has('name') )<br>
        <p class="text-danger"> {{ $errors->first('name') }} </p> 
        @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-1" id="adminLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
      <div class="col-xs-3">{!! Form::text('surname', '', ["class" => "form-control", 'placeholder'=>'ไก๊ไก่ไก๊ไก่']) !!}
        @if( $errors->has('surname') )<br>
        <p class="text-danger"> {{ $errors->first('surname') }} </p> 
        @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-1" id="adminLabel">{!! Form::label('userType', 'บทบาท'); !!}</div>
      <div class="col-xs-3">{!! Form::select('userType', array('staff' => 'เจ้าหน้าที่', 'nurse' => 'พยาบาล', 'phamacist' => 'เภสัชกร', 'doctor' => 'แพทย์', 'admin' => 'ผู้ดูแลระบบ'), null, ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-1" id="adminLabel">{!! Form::label('department', 'แผนก'); !!}</div>
      <div class="col-xs-3">{!! Form::select('departmentId', $department, null, ["class" => "form-control"]) !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-1" id="adminLabel">{!! Form::label('username', 'ชื่อผู้ใช้'); !!}</div>
        <div class="col-xs-3">{!! Form::text('username', '', ["class" => "form-control", 'placeholder'=>'pokepokemon']) !!}
          @if( $errors->has('username') )<br>
        <p class="text-danger"> {{ $errors->first('username') }} </p> 
        @endif
        </div>
      </div> 
      <div class="form-group row">
        <div class="col-xs-1" id="adminLabel">{!! Form::label('email', 'อีเมล'); !!}</div>
        <div class="col-xs-3">{!! Form::text('email', '', ["class" => "form-control", 'placeholder'=>'poke@ihospital.com']) !!}
          @if( $errors->has('email') )<br>
        <p class="text-danger"> {{ $errors->first('email') }} </p> 
        @endif
        </div>
      </div> 
      <div class="form-group row">
        <div class="col-xs-1"></div>
        <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
      </div>
    </div>
  </div>

  {!! Form::close() !!}
  @stop