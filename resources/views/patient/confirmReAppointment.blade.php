@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ยืนยันการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "confirmAppointmentwindow">	
			<span class ="bold">รหัสผู้ป่วย : </span> {{ $appointment->patient->hospitalNo }} <br><br>
			<span class ="bold">ผู้ป่วย : </span> {{ $appointment->patient->fullname() }}
			<br><br>
			<div class ="row">
				<div class ="col-md-3">
					<span class ="bold">แผนก : </span> {{ $appointment->department()->departmentName }}
				</div>
				<div class ="col-md-9">
					<span class ="bold">อาคาร : </span>{{ $appointment->department()->departmentBuilding }}
				</div>	
			</div>

			<br>
			<div class ="row">
				<div class = "col-md-12">
					<span class ="bold">แพทย์ : </span> {{ $appointment->doctor()->fullname() }}
				</div>
			</div>
			<br>
			<div class ="row">

				<div class ="col-md-3">
					<span class ="bold">วันที่ : </span>{{ $schedule->diagDate }}
				</div>
				<div class ="col-md-9">
					<span class ="bold">เวลา : </span> {{ $schedule->diagTime }}
				</div>	
			</div>
			<br>

			{!! Form::open(array('url' => 'delayAppointment')) !!}
				{!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
				{!! Form::hidden('scheduleId', $schedule->scheduleId) !!}
				{!! Form::submit('ยืนยัน', ['class' => 'btn btn-left btn-success linkBtn']) !!}
			{!! Form::close() !!}
			<br><br>  
		</div>

	</div>
</div>
@stop
