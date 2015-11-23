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
		<div id = "createAppointmentForm">
			<br>
		
		<div class ="row">
    	<div class ="col-md-3">
    		<span class ="header">แผนก : </span>จักษุวิทยา 
  		</div>
  		<div class ="col-md-2">
			<span class ="header">อาคาร : </span>จามจุรี 9
  		</div>	
  		<div class ="col-md-7">
  			<span class ="header">ชั้น : </span>4 
  		</div>
  	</div>

		<br>
		<span class ="header">แพทย์ : </span>ชลัมพล
		<br><br>
		<div class ="row">
					
					<div class ="col-md-3">
						<span class ="header">วันที่ : </span>19/11/2015
					</div>
					<div class ="col-md-9">
						<span class ="header">เวลา : </span>9.00 น. - 12.00 น.
					</div>	
				</div>
		<br>

	     	<a href="{{ url('/mainPatient') }}" class="btn btn-left btn-success linkBtn">ยืนยัน</a>
      <br><br>  
</div>

</div>
</div>
@stop
