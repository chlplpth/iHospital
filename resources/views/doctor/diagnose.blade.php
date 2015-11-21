@extends('layout/doctorLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">บันทึกการวินิจฉัยผู้ป่วย</h3>
  		</div>
  		<div class="panel-body" style="margin-left:40px;">
  			<form role="form">
  				<div class="form-group row">  
			        <label class="col-xs-2" id="doctorLabel">รหัสผู้ป่วย</label>
			        <label class="col-xs-10" id="doctorLabel">1011001010</label>
			    </div>
		        <div class="form-group row">  
			        <label class="col-xs-2" id="doctorLabel">ชื่อ</label>
			        <label class="col-xs-10" id="doctorLabel">ชลัมพล</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">นามสกุล</label>
			        <label class="col-xs-10" id="doctorLabel">ไก๊ไก่ไก๊ไก่</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">รหัสโรค</label>
			        <div class="col-xs-2">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    </div>
			    <div class="form-group row">
		        	<label class="col-xs-2" id="doctorLabel">ชื่อโรค</label>
			        <div class="col-xs-2">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">รายละเอียดการตรวจ</label>
		          	<div class="col-xs-10" style="width: 260px;">
		          		{!! Form::textarea('id', '', ["class" => "form-control", "rows" => "5"]) !!}
		          	</div>
		        </div>
		        <div class="form-group row">
		        	<label class="col-xs-2" id="doctorLabel"></label>
		        	<div class="col-xs-10" style="width: 260px;">
	        			{!! Form::submit('ยืนยัน', ["class" => "btn btn-success", 'id' => 'buttonGroup']) !!}
	        		</div>
	        	</div>
	        </form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop