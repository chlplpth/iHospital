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
      <div class="col-xs-1" id="adminLabel">{!! Form::label('role', 'บทบาท'); !!}</div>
      <div class="col-xs-3">{!! Form::select('role', array('Staff' => 'เจ้าหน้าที่', 'Nurse' => 'พยาบาล', 'Phamacist' => 'เภสัชกร', 'Doctor' => 'แพทย์', 'Admin' => 'ผู้ดูแลระบบ'), null, ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-1" id="adminLabel">{!! Form::label('department', 'แผนก'); !!}</div>
      <div class="col-xs-3">{!! Form::select('department', array(
        '0' => 'ไม่ระบุ',
        '1' => 'กายวิภาคศาสตร์', 
        '2' => 'กุมารเวชศาสตร์',
        '3' => 'จิตเวชศาสตร์',
        '4' => 'จุลชีววิทยา',
        '5' => 'จักษุวิทยา',
        '6' => 'ชีวเคมี',
        '7' => 'นิติเวชศาสตร์',
        '8' => 'ปรสิตวิทยา',
        '9' => 'พยาธิวิทยา',
        '10' => 'เภสัชวิทยา',
        '11' => 'รังสีวิทยา',
        '12' => 'วิสัญญีวิทยา',
        '13' => 'เวชศาสตร์ชันสูตร',
        '14' => 'เวชศาสตร์ป้องกันและสังคม',
        '15' => 'เวชศาสตร์ฟื้นฟู',
        '16' => 'ศัลยศาสตร์',
        '17' => 'สรีรวิทยา',
        '18' => 'สุติศาสตร์-นารีเวชวิทยา',
        '19' => 'โสต คอ นาสิกวิทยา',
        '20' => 'ออโธปิดิกส์',
        '21' => 'อายุรศาสตร์'), null, ["class" => "form-control"]) !!}</div>
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
        <div class="col-xs-1"></div>
        <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
      </div>
    </div>
  </div>

  {!! Form::close() !!}
  @stop