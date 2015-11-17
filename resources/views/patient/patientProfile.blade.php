@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
	</div>
	<div class="panel-body">

		<span class ="header">รหัสประจำตัวผู้ป่วย : </span>PatientID 
		<br> <br>
		
		<div class="row">
			<div class="col-md-4"> <span class ="header">ชื่อ : </span>ชื่อจริง 
			</div>
			<div class="col-md-8">{!! Form::label('lastname', 'นามสกุล : '); !!} &nbsp
				{!! Form::label('lastname', 'นามสกุล'); !!}
			</div>
		</div>
		<br>

		<div class ="row">
    	<div class ="col-md-2">
		  	{!!Form::label('sex', 'เพศ : ');!!}
  			{!! Form::label('sex', 'ชาย'); !!}
  		</div>
  		<div class ="col-md-2">
  			{!!Form::label('bloodType', 'กรุ๊ปเลือด : ');!!}
  			{!! Form::label('BloodType', 'O'); !!}
  		</div>	
  		<div class ="col-md-8">
			{!!Form::label('birthDate', 'วัน/เดือน/ปี เกิด : ');!!}
			{!!Form::label('birthDate','28/03/1994');!!}

  		</div>
  	</div>

		<br>

		{!! Form::label('address', 'ที่อยู่'); !!} &nbsp
		{!! Form::text('address', '199/36 หมุ่.1 ต.รั่วใหญ่ อ.เมือง จ.สุพรรณบุรี 72000', ['class'=>'textbox textbox500px']);!!}


	<div class="row"><br>
		<div class="col-md-6">{!! Form::label('homeNumber', 'เบอร์บ้าน : '); !!} &nbsp
			{!! Form::label('homeNumber', '02-XXXXXXX');!!}
		</div>
		<div class="col-md-6">{!! Form::label('phoneNumber', 'เบอร์มือถือ : '); !!} &nbsp
			{!! Form::label('phoneNumber', '08X-XXX-XXXX');!!}
		</div>

	</div> <br>

	{!! Form::label('emailAddress', 'อีเมล : '); !!} &nbsp
	{!! Form::label('emailAddress', 'earthnapat12@gmail.com');!!}

	<br><br>


</div>
</div>
@stop
