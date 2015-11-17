@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body">


		{!! Form::label('id', 'รหัสประจำตัวผู้ป่วย'); !!} &nbsp
		{!! Form::text('id','', ['class'=>'textbox', 'placeholder'=>'Patient ID']); !!}  <br> <br>



		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5 form-inline">{!! Form::label('department', 'แผนก'); !!} &nbsp
		{!! Form::select('department', array(
		'0' => 'ไม่ระบุ',
		'1' => 'กายวิภาคศาสตร์', 
		'2' => 'กุมารเวชศาสตร์',
		'3' => 'จิตเวชศาสตร์',
		'4' => 'จุลชีววิทยา',
		'5' => 'จักษุวิทยา',
		'6' => 'ชีวเคมี',
		'7' => 'นิติเวชศาสตร์',
		'8' => 'ปรสิตวิทยา',
		'9' => 'พยาธิวิทยา',
		'10' => 'เภสัชวิทยา',
		'11' => 'รังสีวิทยา',
		'12' => 'วิสัญญีวิทยา',
		'13' => 'เวชศาสตร์ชันสูตร',
		'14' => 'เวชศาสตร์ป้องกันและสังคม',
		'15' => 'เวชศาสตร์ฟื้นฟู',
		'16' => 'ศัลยศาสตร์',
		'17' => 'สรีรวิทยา',
		'18' => 'สุติศาสตร์-นารีเวชวิทยา',
		'19' => 'โสต คอ นาสิกวิทยา',
		'20' => 'ออโธปิดิกส์',
		'21' => 'อายุรศาสตร์'),'0',["class" => "form-control"])!!} <br><br></div>
			<div class="col-md-5 form-inline">
			{!! Form::label('doctor', 'แพทย์'); !!} &nbsp
		{!! Form::select('doctor', array(
		'0' => 'ไม่ระบุ',
		'1' => 'กายวิภาคศาสตร์', 
		'2' => 'กุมารเวชศาสตร์',
		'3' => 'จิตเวชศาสตร์',
		'4' => 'จุลชีววิทยา',
		'5' => 'จักษุวิทยา',
		'6' => 'ชีวเคมี',
		'7' => 'นิติเวชศาสตร์',
		'8' => 'ปรสิตวิทยา',
		'9' => 'พยาธิวิทยา',
		'10' => 'เภสัชวิทยา',
		'11' => 'รังสีวิทยา',
		'12' => 'วิสัญญีวิทยา',
		'13' => 'เวชศาสตร์ชันสูตร',
		'14' => 'เวชศาสตร์ป้องกันและสังคม',
		'15' => 'เวชศาสตร์ฟื้นฟู',
		'16' => 'ศัลยศาสตร์',
		'17' => 'สรีรวิทยา',
		'18' => 'สุติศาสตร์-นารีเวชวิทยา',
		'19' => 'โสต คอ นาสิกวิทยา',
		'20' => 'ออโธปิดิกส์',
		'21' => 'อายุรศาสตร์'),'0',["class" => "form-control"])!!} <br><br></div>
			<div class="col-md-1"></div>
		</div>

		{!! Form::label('symptom', 'อาการเบื้องต้น'); !!} &nbsp <br>
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-1">{!! Form::textarea('symptom','', ['class'=>'textbox', 'placeholder'=>'Symptom']); !!} <br> <br></div>
		
		</div>

		{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
		{!! Form::close() !!}




	</div>
</div>
@stop
