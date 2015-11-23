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
		<span class ="header">รหัสประจำตัวผู้ป่วย : </span> {{ $user->patient->hospitalNo }}
		<br> <br>
		
		<div class="row">
			<div class="col-md-4"> <span class ="header">ชื่อ : </span> {{ $user->name }}
			</div>
			<div class="col-md-8"><span class ="header">นามสกุล : </span> {{ $user->surname }}
			</div>
		</div>
		<br>

		<div class ="row">
    	<div class ="col-md-2">
    		<span class ="header">เพศ : </span> {{ $user->patient->sex }}
  		</div>
  		<div class ="col-md-2">
			<span class ="header">กรุ๊ปเลือด : </span> {{ $user->patient->bloodGroup }}
  		</div>	
  		<div class ="col-md-8">
  			<span class ="header">วัน/เดือน/ปี เกิด : </span> {{ $user->patient->dateOfBirth }}
  		</div>
  	</div>

		<br>

		<div class ="row">
					
					<div class ="col-md-2">
						<span class ="header">บ้านเลขที่ : </span> {{ $address['addressNo'] }}
					</div>
					<div class ="col-md-2">
						<span class ="header">หมู่ : </span> {{ $address['moo'] }}
					</div>	
					<div class ="col-md-3">
							<span class ="header">ถนน : </span> {{ $address['street'] }}
						</div>
					<div class ="col-md-4">
						<span class ="header">แขวง/ตำบล : </span> {{ $address['subdistrict'] }}
					</div>
					<div class ="col-md-1">
					</div>
				</div>
				<br>
				<div class ="row">
					
					<div class ="col-md-4">
						<span class ="header">เขต/อำเภอ : </span> {{ $address['district'] }}
					</div>
					<div class ="col-md-3 province">
						<span class ="header">จังหวัด : </span> {{ $address['province'] }}
					</div>	
					<div class ="col-md-4">
						<span class ="header">รหัสไปรษณีย์ : </span> {{ $address['zipcode'] }}
					</div>
					<div class ="col-md-1">
					</div>
				</div>
				<br>
				<div class ="row">
					
					<div class ="col-md-4">
						<span class ="header">โทรศัพท์บ้าน : </span> {{ $user->patient->telHome }}
					</div>
					<div class ="col-md-4">
						<span class ="header">โทรศัพท์มือถือ : </span> {{ $user->patient->telMobile }}
					</div>
					<div class ="col-md-4">
					</div>
				</div>
				<br>
				<span class ="header">อีเมล : </span> {{ $user->email }}

	<br><br>
</div>

</div>
</div>
@stop
