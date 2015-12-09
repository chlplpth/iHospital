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
    		<span class="bold">แผนก : </span>จักษุวิทยา 
  		</div>
  		<div class ="col-md-2">
			<span class="bold">อาคาร : </span>จามจุรี 9
  		</div>	
  		<div class ="col-md-7">
  			<span class="bold">ชั้น : </span>4 
  		</div>
  	</div>

		<br>
		<span class="bold">แพทย์ : </span>ชลัมพล
		<br><br>
		<div class ="row">
					
					<div class ="col-md-3">
						<span class="bold">วันที่ : </span>19/11/2015
					</div>
					<div class ="col-md-9">
						<span class="bold">เวลา : </span>9.00 น. - 12.00 น.
					</div>	
				</div>
		<br>

	     	<a href="{{ url('/mainPatient') }}" class="btn btn-left btn-danger">ยกเลิก</a>
      <br><br>  
</div>

</div>
</div>
@stop
