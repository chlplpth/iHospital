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
  		<div class="panel-body" style="margin-left:40px; margin-top:2%">
  			<form role="form">
		        <div class="form-group row">
		          <div class="col-xs-2" id="nurseLabel">{!! Form::label('id', 'รหัสผู้ป่วย') !!}</div>
		          <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
		          <div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
		        </div>
		        <div class="form-group row">  
			        <label class="col-xs-2" id="nurseLabel">ชื่อ</label>
			        <label class="col-xs-10" id="nurseLabel">ชลัมพล</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">นามสกุล</label>
			        <label class="col-xs-10" id="nurseLabel">ไก๊ไก่ไก๊ไก่</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">น้ำหนัก</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-9" id="nurseLabel">กิโลกรัม</label>
			    </div>
			    <div class="form-group row">
		        	<label class="col-xs-2" id="nurseLabel">ส่วนสูง</label>
			        <div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			        <label class="col-xs-9" id="nurseLabel">เซนติเมตร</label>
			    </div>
			    <div class="form-group row">
			    	<label class="col-xs-2" id="nurseLabel">ความดันโลหิต</label>
			    	<div class="col-xs-3">
			    		<div class="row">
			    			<div class="col-xs-5" style="padding-right:1%;">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    			<label class="col-xs-2" id="nurseLabel" style="text-align: center;">/</label>
			    			<div class="col-xs-5" style="padding-left:1%">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    		</div>
			    	</div>
			        <label class="col-xs-6" id="nurseLabel">มิลลิเมตรปรอท</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">อัตราการเต้นหัวใจ</label>
			   		<div class="col-xs-1">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    	<label class="col-xs-9" id="nurseLabel">ครั้งต่อนาที</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="nurseLabel">อาการเบื้องต้น</label>
		          	<div class="col-xs-6">
		          		{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5"]) !!}
		          	</div>
		        </div>
		        <div class="form-group row" id="buttonGroup">
	        		<div class="col-xs-8">{!! Form::submit('เสร็จสิ้น', ["class" => "btn btn-success"]) !!}</div>
	        	</div>
	        </form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop