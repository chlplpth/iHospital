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
		<div id = "patientProfile">
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span> {{ $user->patient->hospitalNo }}
			<br> <br>
			
			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span> {{ $user->name }}
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span> {{ $user->surname }}
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class="bold">เพศ : </span> {{ $user->patient->sex }}
				</div>
				<div class ="col-md-2">
					<span class="bold">กรุ๊ปเลือด : </span> {{ $user->patient->bloodGroup }}
				</div>	
				<div class ="col-md-8">
					<span class="bold">วัน/เดือน/ปี เกิด : </span> {{ $user->patient->dateOfBirth }}
				</div>
			</div>

			<br>

			<div class ="row">
				
				<div class ="col-md-2">
					<span class="bold">บ้านเลขที่ : </span> {{ $address['addressNo'] }}
				</div>
				<div class ="col-md-2">
					<span class="bold">หมู่ : </span> {{ $address['moo'] }}
				</div>	
				<div class ="col-md-3">
					<span class="bold">ถนน : </span> {{ $address['street'] }}
				</div>
				<div class ="col-md-4">
					<span class="bold">แขวง/ตำบล : </span> {{ $address['subdistrict'] }}
				</div>
				<div class ="col-md-1">
				</div>
			</div>
			<br>
			<div class ="row">
				
				<div class ="col-md-4">
					<span class="bold">เขต/อำเภอ : </span> {{ $address['district'] }}
				</div>
				<div class ="col-md-3 province">
					<span class="bold">จังหวัด : </span> {{ $address['province'] }}
				</div>	
				<div class ="col-md-4">
					<span class="bold">รหัสไปรษณีย์ : </span> {{ $address['zipcode'] }}
				</div>
				<div class ="col-md-1">
				</div>
			</div>
			<br>
			<div class ="row">
				
				<div class ="col-md-4">
					<span class="bold">โทรศัพท์บ้าน : </span> {{ $user->patient->telHome }}
				</div>
				<div class ="col-md-4">
					<span class="bold">โทรศัพท์มือถือ : </span> {{ $user->patient->telMobile }}
				</div>
				<div class ="col-md-4">
				</div>
			</div>
			<br>
			<span class="bold">อีเมล : </span> {{ $user->email }}
			<div class ="row">
				
				<div class ="col-md-8"></div>
				<div class ="col-md-2">
					<a href = "{{ url('/editProfile') }}" class="btn btn-warning" id="goToEdit">แก้ไข</a>
				</div>
				<div class ="col-md-2"></div>
			</div>
		</div>

	</div>
</div>
@stop
