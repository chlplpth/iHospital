@extends('layout/doctorLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">ค้นหาผู้ป่วย</h3>
  		</div>
  		<div class="panel-body">
  			<form role="form">
		        <div class="form-group row">
		          <div class="col-xs-2" id="doctorLabel">{!! Form::label('id', 'รหัสผู้ป่วย') !!}</div>
		          <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
		          <div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-info"]) !!}</div>
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
		          	<div class="col-xs-10">
		          		{!! Form::textarea('id', '', ["class" => "form-control", "rows" => "5"]) !!}
		          	</div>
		        </div>
		        <div class="form-group" id="buttonGroup">
	        		{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
	        	</div>
	        </form>
  		</div>`
	</div>

	{!! Form::close() !!}
@stop