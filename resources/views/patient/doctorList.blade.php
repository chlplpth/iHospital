@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บุคลากร</h3>
	</div>
	<br>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4 form-inline">{!! Form::label('department', 'แผนก'); !!} &nbsp
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
			<div class="col-md-4">{!! Form::label('doctorOrDepartment', 'ชื่อแพทย์ / แผนก'); !!} &nbsp
				{!! Form::text('doctor', '', ['class'=>'textbox', 'placeholder'=>'ชื่อแพทย์ / แผนก']);!!}
			</div>
			<div class="col-md-3">{!! Form::submit('ค้นหา', ["class" => "btn btn-warning"]) !!}
			</div>

		</div>
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-7">
				{!!Form::radio('doctorOrDepartment', 'Do', true);!!}&nbsp
				{!!Form::label('doctor', 'แพทย์');!!}&nbsp&nbsp
				{!!Form::radio('doctorOrDepartment', 'De', false);!!}&nbsp
				{!!Form::label('department', 'แผนก');!!}
			</div>
		</div>
		<br><br>
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<a href="#" class="thumbnail">
					<img src="smurf.jpg" alt="Profile"width="200" height="200">
				</a>
			</div>
			<div class="col-md-6">
				<span class ="header">ชื่อแพทย์ : </span>นพ.XXXXX <br><br>
				<span class ="header">แผนก : </span>จิตเวช <br><br>
				<span class ="header">ความเชี่ยวชาญ : </span>จิตวิทยา <br><br>
				<span class ="header">ประวัติการศึกษา : </span>Chulalongkorn University 
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<a href="#" class="thumbnail">
					<img src="smurf.jpg" alt="Profile"width="200" height="200">
				</a>
			</div>
			<div class="col-md-6">
				<span class ="header">ชื่อแพทย์ : </span>นพ.XXXXX <br><br>
				<span class ="header">แผนก : </span>จิตเวช <br><br>
				<span class ="header">ความเชี่ยวชาญ : </span>จิตวิทยา <br><br>
				<span class ="header">ประวัติการศึกษา : </span>Chulalongkorn University 
			</div>
		</div>
		

	</div>


	@stop