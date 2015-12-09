@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">

@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "createAppointmentForm">
			
			<span class ="bold">รหัสประจำตัวผู้ป่วย&nbsp;&nbsp;</span>
			{!! Form::text('HN', '', ['class'=>'textbox', 'placeholder'=>'รหัสประจำตัวผู้ป่วย']);!!}
			{!! Form::submit('ค้นหา', ["class" => "btn btn-info","id" =>"searchButton"]) !!}
		</div>
	</div>
</div>

{!! Form::close() !!}
@stop
