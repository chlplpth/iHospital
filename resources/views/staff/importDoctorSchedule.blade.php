@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">นำเข้าตารางการออกตรวจ</h3>
	</div>
	<div class="panel-body" style="margin-left:40px; margin-top:2%;">
		<form role="form">
			<div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อหรือรหัสแพทย์'); !!}</div>
      <div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control", 'placeholder'=>'กรอกชื่อหรือรหัสแพทย์']) !!}</div>
      <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
    </div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('id', '12345678'); !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-12" for="inputFile">ข้อมูลนำเข้า</label>
				<div class="col-xs-12">{!! Form::file('filename') !!}</div>
			</div>
		</form>
	</div>
</div>

{!! Form::close() !!}
@stop