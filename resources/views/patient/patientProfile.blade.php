@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
	</div>
	<div class="panel-body">
		<div id = "createAppointmentForm">
			<br>
		<span class ="header">รหัสประจำตัวผู้ป่วย : </span>PatientID 
		<br> <br>
		
		<div class="row">
			<div class="col-md-4"> <span class ="header">ชื่อ : </span>ชื่อจริง 
			</div>
			<div class="col-md-8"><span class ="header">นามสกุล : </span>นามสกุล
			</div>
		</div>
		<br>

		<div class ="row">
    	<div class ="col-md-2">
    		<span class ="header">เพศ : </span>ชาย 
  		</div>
  		<div class ="col-md-2">
			<span class ="header">กรุ๊ปเลือด : </span>O
  		</div>	
  		<div class ="col-md-8">
  			<span class ="header">วัน/เดือน/ปี เกิด : </span>XX/XX/XXXX 
  		</div>
  	</div>

		<br>

		<div class ="row">
					
					<div class ="col-md-2">
						<span class ="header">บ้านเลขที่ : </span>199/36 
					</div>
					<div class ="col-md-2">
						<span class ="header">หมู่ : </span>1
					</div>	
					<div class ="col-md-3">
							<span class ="header">ถนน : </span>สมภารคง
						</div>
					<div class ="col-md-4">
						<span class ="header">แขวง/ตำบล : </span>รั้วใหญ่
					</div>
					<div class ="col-md-1">
					</div>
				</div>
				<br>
				<div class ="row">
					
					<div class ="col-md-4">
						<span class ="header">เขต/อำเภอ : </span>เมือง
					</div>
					<div class ="col-md-3 province">
						<span class ="header">จังหวัด : </span>สุพรรณบุรี
					</div>	
					<div class ="col-md-4">
						<span class ="header">รหัสไปรษณีย์ : </span>72000
					</div>
					<div class ="col-md-1">
					</div>
				</div>
				<br>
				<div class ="row">
					
					<div class ="col-md-4">
						<span class ="header">โทรศัพท์บ้าน : </span>0X-XXXXXXX
					</div>
					<div class ="col-md-4">
						<span class ="header">โทรศัพท์มือถือ : </span>0XX-XXXXXXX
					</div>
					<div class ="col-md-4">
					</div>
				</div>
				<br>
				<span class ="header">อีเมล : </span>XXXXX_XXXXX@gmail.com

	<br><br>
</div>

</div>
</div>
@stop
