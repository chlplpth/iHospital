@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ยกเลิกการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "cancelAppointmentForm">
			<br>
		
		<div class ="row">
    	<div class ="col-md-3">
    		<span class="bold">แผนก : </span> {{ $appointment->department()->departmentName }}
  		</div>
  		<div class ="col-md-9">
			<span class="bold">อาคาร : </span> {{ $appointment->department()->departmentBuilding }}
  		</div>	
  	</div>

		<br>
		<span class="bold">แพทย์ : </span> {{ $appointment->doctor()->fullname() }}
		<br><br>
		<div class ="row">
					
					<div class ="col-md-3">
						<span class="bold">วันที่ : </span>{{ $appointment->diagDate() }}
					</div>
					<div class ="col-md-9">
						<span class="bold">เวลา : </span> {{ $appointment->diagTime() }}
					</div>	
				</div>
		<br>

			{!! Form::open(array('url' => 'cancelAppointmentStore')) !!}
				{!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
	     		{!! Form::submit('ยกเลิก', ['class' => 'btn btn-left btn-danger']) !!}
	     	{!! Form::close() !!}
      <br><br>  
</div>

</div>
</div>
@stop
