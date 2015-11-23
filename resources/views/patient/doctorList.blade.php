@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'doctorList')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลแพทย์</h3>
	</div>
	<div class="panel-body">
		<div id="doctorList">
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
					@endif
				</div>


				<div class="col-md-4">{!! Form::label('name', 'ชื่อแพทย์'); !!} &nbsp
					{!! Form::text('doctor', '', ['class'=>'textbox', 'placeholder'=>'ณภัทร']);!!}
					@if( $errors->has('name') )<br><br>
					<p class="text-danger"> {{ $errors->first('name') }} </p> 
					@endif
				</div>

				<div class="col-md-3">{!! Form::submit('ค้นหา', ['class' => 'btn btn-info', 'id' => 'searchDoctorButton']) !!}</div>
			</div>
			<br><br>
			<div id="doctorData">
				<div class="row">	
					<div class="col-md-1"></div>
					<div class="col-md-3">
						{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
					</div>
					<div class="col-md-6"><br>
						<span class ="header">ชื่อแพทย์ : </span> <br><br>
						<span class ="header">แผนก : </span> <br><br>
						<span class ="header">ความเชี่ยวชาญและประสบการณ์ : </span><br><br>
					</div>
					<div class="col-md-2"></div>
				</div>
				<br>
				<div class="row">	
					<div class="col-md-1"></div>
					<div class="col-md-3">
						{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
					</div>
					<div class="col-md-6"><br>
						<span class ="header">ชื่อแพทย์ : </span> <br><br>
						<span class ="header">แผนก : </span> <br><br>
						<span class ="header">ความเชี่ยวชาญและประสบการณ์ : </span><br><br>
					</div>
					<div class="col-md-2"></div>
				</div>
				<br>
				<div class="row">	
					<div class="col-md-1"></div>
					<div class="col-md-3">
						{!! HTML::image('image/DoctorPicture/smurf.jpg', 'Profile', ['width' => '200px' , 'height' => '200px' ]) !!}
					</div>
					<div class="col-md-6"><br>
						<span class ="header">ชื่อแพทย์ : </span> <br><br>
						<span class ="header">แผนก : </span> <br><br>
						<span class ="header">ความเชี่ยวชาญและประสบการณ์ : </span><br><br>
					<div class="col-md-2"></div>
				</div>
			</div>
		</div>
	</div>

</div>
{!! Form::close() !!}

@stop