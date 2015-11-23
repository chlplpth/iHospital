@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => '/addStaffByStaff')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มบุคลากร</h3>
  		</div>
  		<div class="panel-body">
	        <div id="addStaffForm">
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('name', 'ชื่อ'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('name', '', ['class' => 'form-control']) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('surname', 'นามสกุล'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('surname', '', ['class' => 'form-control']) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('userType', 'บทบาท'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('userType', array('doctor' => 'แพทย์', 'nurse' => 'พยาบาล', 'staff' => 'เจ้าหน้าที่', 'phamacist' => 'เภสัชกร', 'admin' => 'ผู้ดูแลระบบ'), null, ['class' => 'form-control']) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('departmentId', 'แผนก'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('departmentId', $department, null, ['class' => 'form-control']) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('username', 'ชื่อผู้ใช้'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('username', '', ['class' => 'form-control']) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-2">{!! Form::label('email', 'อีเมล'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('email', '', ['class' => 'form-control']) !!}</div>
	            </div> 
	            <div class="form-group row">
	              <div class="col-xs-4"></div>
	              <div class="col-xs-2">{!! Form::submit('เพิ่ม', ['class' => 'btn btn-success','id'=>'addStaffButton']) !!}</div>
	            </div>
	        </div>
  		</div>
	</div>

	{!! Form::close() !!}
@stop