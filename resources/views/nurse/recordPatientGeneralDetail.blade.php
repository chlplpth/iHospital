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
  			<form role="form">
		        <div class="form-group row">
		          <div class="col-xs-2" id="nurseLabel">{!! Form::label('id', 'รหัสผู้ป่วย') !!}</div>
		          <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
		          <div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-info"]) !!}</div>
		        </div>
		        <div class="form-group row">  
			        <label class="col-xs-2">ชื่อ</label>
			        <label class="col-xs-10">ชลัมพล</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2">นามสกุล</label>
			        <label class="col-xs-10">ไก๊ไก่ไก๊ไก่</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">น้ำหนัก</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-9" id="nurseLabel">กิโลกรัม</label>
			    </div>
			    <div class="form-group row">
		        	<label class="col-xs-2" id="nurseLabel">ส่วนสูง</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-9" id="nurseLabel">เซ็นติเมตร</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">ความดันโลหิต</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-1" id="nurseLabel" style="text-align: center;">/</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-6" id="nurseLabel">มิลลิเมตรปรอท</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">อัตราการเต้นหัวใจ</label>
			   		<div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    	<label class="col-xs-9" id="nurseLabel">ครั้งต่อนาที</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">อาการเบื้องต้น: </label>
		          	<div class="col-xs-10">
		          		{!! Form::textarea('id', '', ["class" => "form-control", "rows" => "5"]) !!}
		          	</div>
		        </div>
		        <div class="form-group" id="buttonGroup">
	        		{!! Form::submit('เสร็จสิ้น', ["class" => "btn btn-success"]) !!}
	        	</div>
	        </form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop