@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/addDepartment')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มแผนก</h3>
  </div>
  <div class="panel-body form">
    <div id="addDepartmentForm">
      <div class="form-group row">
        <label class="col-xs-2">ชื่อแผนก</label>
        <div class="col-xs-3">{!! Form::text('departmentName', '', ['class' => 'form-control', 'placeholder'=>'จักษุวิทยา']) !!}
          @if( $errors->has('department') )<br>
          <p class="text-danger"> {{ $errors->first('department') }} </p> 
          @endif
        </div>
      </div>
      <div class="form-group row">
        <label class="col-xs-2">อาคาร/ชั้น</label>
        <div class="col-xs-3">{!! Form::text('departmentBuilding', '', ['class' => 'form-control', 'placeholder'=>'ตึก 4 ชั้น 17']) !!}
          @if( $errors->has('department') )<br>
          <p class="text-danger"> {{ $errors->first('department') }} </p> 
          @endif
        </div>
      </div>
      <div class="form-group row">
        <label class="col-xs-2">เบอร์โทรศัพท์</label>
        <div class="col-xs-3">{!! Form::text('departmentTel', '', ['class' => 'form-control', 'placeholder'=>'(+66) 0-2218-6956-7']) !!}
          @if( $errors->has('department') )<br>
          <p class="text-danger"> {{ $errors->first('department') }} </p> 
          @endif
        </div>
        <div class="col-xs-2"></div>
      </div>
      <div class="form-group row">
        <div class="col-xs-3"></div>
        <div class="col-xs-2" style="margin-left:30px;">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop

