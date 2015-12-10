@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ยืนยันการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "confirmAppointmentForPatientwindow">	
			<span class ="bold">รหัสผู้ป่วย : </span>HN-00000001 <br><br>
			<span class ="bold">ผู้ป่วย : </span> ชลธร ขวัญขจรเกียรติ
			<br><br>
			<div class ="row">
				<div class ="col-md-3">
					<span class ="bold">แผนก : </span>จักษุวิทยา 
				</div>
				<div class ="col-md-2">
					<span class ="bold">อาคาร : </span>จามจุรี 9
				</div>	
				<div class ="col-md-7">
					<span class ="bold">ชั้น : </span>4 
				</div>
			</div>

			<br>
			<div class ="row">
				<div class = "col-md-12">
					<span class ="bold">แพทย์ : </span>ชลัมพล
				</div>
			</div>
			<br>
			<div class ="row">

				<div class ="col-md-3">
					<span class ="bold">วันที่ : </span>19/11/2015
				</div>
				<div class ="col-md-9">
					<span class ="bold">เวลา : </span>9.00 น. - 12.00 น.
				</div>	
			</div>
			<br>

			<a href="{{ url('/mainStaff') }}" class="btn btn-left btn-success linkBtn">ยืนยัน</a>
			<br><br>  
		</div>

	</div>
</div>
@stop
