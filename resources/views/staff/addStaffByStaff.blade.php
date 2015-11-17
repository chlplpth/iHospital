@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มบุคลากร</h3>
  		</div>
  		<div class="panel-body" style="margin-top: 10px;">
	        <form role="form">
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('surname', '', ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('role', 'บทบาท'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('role', array('Doctor' => 'แพทย์', 'Nurse' => 'พยาบาล', 'Staff' => 'เจ้าหน้าที่', 'Phamacist' => 'เภสัชกร', 'Admin' => 'ผู้ดูแลระบบ'), null, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('department', 'แผนก'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('department', array('A' => 'หู', 'B' => 'ตา', 'C' => 'จมูก', 'D' => 'ปาก'), null, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('username', 'ชื่อผู้ใช้'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('username', '', ["class" => "form-control"]) !!}</div>
	            </div> 
	            <div class="form-group row">
	              <div class="col-xs-1"></div>
	              <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
	            </div>
	        </form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop