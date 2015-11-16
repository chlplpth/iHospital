@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
	</div>
	<div class="panel-body">


		{!! Form::label('id', 'รหัสประจำตัวผู้ป่วย'); !!} &nbsp
		{!! Form::text('id','Patient ID', ['class'=>'textbox textbox100px','disabled'=>'true' ]); !!} 
		<br> <br>
		
		<div class="row">
			<div class="col-md-4"> {!! Form::label('firstname', 'ชื่อจริง'); !!} &nbsp
				{!! Form::text('firstname', 'ชื่อจริง', ['class'=>'textbox']);!!} 
			</div>
			<div class="col-md-8">{!! Form::label('lastname', 'นามสกุล'); !!} &nbsp
				{!! Form::text('lastname', 'นามสกุล', ['class'=>'textbox']); !!}
			</div>
		</div>
		<br>

		<div class ="row">
    	<div class ="col-md-2">
  	{!!Form::label('sex', 'เพศ');!!}&nbsp&nbsp&nbsp{!!Form::radio('sex', 'M', true);!!}&nbsp{!!Form::label('male', 'ชาย');!!}&nbsp&nbsp{!!Form::radio('sex', 'F', false);!!}&nbsp{!!Form::label('female', 'หญิง');!!}
  		</div>
  		<div class ="col-md-2">
  			{!!Form::label('bloodType', 'กรุ๊ปเลือด');!!}
  			{!!Form::select('size', array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'));!!}
  		</div>	
  		<div class ="col-md-8">
			{!!Form::label('birthDate', 'วัน/เดือน/ปี เกิด');!!}
			{!!Form::text('birthDate','วัน/เดือน/ปี เกิด',['class'=>'textbox','disabled'=>'true' ]);!!}

  		</div>
  	</div>

		<br>

		{!! Form::label('address', 'ที่อยู่'); !!} &nbsp
		{!! Form::text('address', '199/36 หมุ่.1 ต.รั่วใหญ่ อ.เมือง จ.สุพรรณบุรี 72000', ['class'=>'textbox textbox500px']);!!}


	<div class="row"><br>
		<div class="col-md-6">{!! Form::label('homeNumber', 'เบอร์บ้าน'); !!} &nbsp
			{!! Form::text('homeNumber', '02-XXXXXXX', ['class'=>'textbox textbox200px']);!!}
		</div>
		<div class="col-md-6">{!! Form::label('phoneNumber', 'เบอร์มือถือ'); !!} &nbsp
			{!! Form::text('phoneNumber', '08X-XXX-XXXX', ['class'=>'textbox textbox200px']);!!}
		</div>

	</div> <br>

	{!! Form::label('emailAddress', 'อีเมล'); !!} &nbsp
	{!! Form::text('emailAddress', 'kamdekdee@hotmail.com', ['class'=>'textbox textbox300px']);!!}

	<br><br>
	{!! Form::submit('แก้ไข', ["class" => "btn btn-warning"]) !!}
	{!! Form::close() !!}




</div>
</div>
@stop
