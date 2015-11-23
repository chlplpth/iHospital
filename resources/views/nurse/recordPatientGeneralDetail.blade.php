@extends('layout/nurseLayout')
@section('css')
<link href="{{asset('css/nurse.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPatientGeneralDetail')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บันทึกข้อมูลทั่วไปของผู้ป่วย</h3>
	</div>
	<div class="panel-body" style="margin-left:40px; margin-top:2%">
		<form role="form">
			<div class="form-group row">
				<div class="col-xs-2" id="nurseLabel">{!! Form::label('hospitalId', 'รหัสผู้ป่วย') !!}</div>
				<div class="col-xs-3">{!! Form::text('patient', '', ["class" => "form-control", 'placeholder' => '12345678']) !!}
					@if( $errors->has('patient') )<br>
					<p class="text-danger"> {{ $errors->first('patient') }} </p> 
					@endif
				</div>
				<div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
			
						{!! Form::close() !!}
						@stop