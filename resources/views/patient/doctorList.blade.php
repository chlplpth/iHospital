@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'doctorList')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลแพทย์</h3>
	</div>
	<br><br>
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
			'21' => 'อายุรศาสตร์'),'0',["class" => "form-control"])!!}
			@if( $errors->has('department') )<br><br>
          			<p class="text-danger"> {{ $errors->first('department') }} </p>
        	@endif</div>

			
			<div class="col-md-4">{!! Form::label('name', 'ชื่อแพทย์'); !!} &nbsp
				{!! Form::text('name', '', ['class'=>'textbox', 'placeholder'=>'ชื่อแพทย์']);!!}
				@if( $errors->has('name') )<br><br>
          			<p class="text-danger"> {{ $errors->first('name') }} </p> 
        	@endif
			</div>
			
			<div class="col-md-3">{!! Form::submit('ค้นหา', ["class" => "btn btn-defalut", "id" => "searchButton"]) !!}
			</div>

		</div>
		
		<br><br>
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<a href="#" class="thumbnail">
					{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
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
					{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
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
{!! Form::close() !!}

	@stop