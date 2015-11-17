@extends('layout/nurseLayout')
@section('css')
<link href="css/nurse.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">บันทึกข้อมูลทั่วไปของผู้ป่วย</h3>
  		</div>
  		<div class="panel-body">
	        <div class="row">
	          <div class="col-xs-2">{!! Form::label('id', 'รหัสผู้ป่วย') !!}</div>
	          <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
	          <div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-info"]) !!}</div>
	        </div>
	        <div class="row" id="margin10">  
		          <label class="col-xs-2">ชื่อ: </label><label class="col-xs-10">ชลัมพล</label>
		          <label class="col-xs-2">นามสกุล: </label><label class="col-xs-10">ไก๊ไก่ไก๊ไก่</label>
		          



		          <label class="col-xs-2">อาการเบื้องต้น: </label><label class="col-xs-10"></label>
		          <div class="col-xs-10">
		          	{!! Form::textarea('id', '', ["class" => "form-control", "rows" => "5"]) !!}
		          </div>
	        </div>
	        <div id="buttonGroup">
        		{!! Form::submit('เสร็จสิ้น', ["class" => "btn btn-success"]) !!}
        	</div>
  		</div>
	</div>

	{!! Form::close() !!}
@stop