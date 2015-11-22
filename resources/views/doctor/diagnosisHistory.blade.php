@extends('layout/doctorLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">สถิติการออกตรวจ</h3>
  		</div>
  		<div class="panel-body" style="margin-top:2%; margin-left: 40px;">
  			<form role="form">
	            <div class="form-group row">
	              <div class="col-xs-1 indent7" id="doctorLabel">{!! Form::label('year', 'ปี'); !!}</div>
	              <div class="col-xs-3">{!! Form::selectRange('year', 2550, 2568, 2558, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1 indent7" id="doctorLabel">{!! Form::label('month', 'เดือน'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('month', ['01' => 'มกราคม', '02' => 'กุมภาพันธ์','03' => 'มีนาคม', 
	              	'04' => 'เมษายน','05' => 'พฤษภาคม', '06' => 'มิถุนายน','07' => 'กรกฎาคม','08' => 'สิงหาคม','09' => 'กันยายน', 
	              	'10' => 'ตุลาคม','11' => 'พฤศจิกายน','12' => 'ธันวาคม'], null, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1 indent7"></div>
	              <div class="col-xs-3">{!! Form::submit('ค้นหา', ["class" => "btn btn-default", 'style'=>'float:right;']) !!}</div>
	            </div>
        	</form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop