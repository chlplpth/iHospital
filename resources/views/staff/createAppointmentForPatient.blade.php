@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">

@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body" style="margin-top:2%;">
		<div id = "createAppointmentForm">
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">รหัสประจำตัวผู้ป่วย</label>
				<div class="col-xs-6">
					{!! Form::text('name', '', ['class'=>'textbox', 'placeholder'=>'รหัสประจำตัวผู้ป่วย']);!!}
					{!! Form::submit('ค้นหา', ["class" => "btn btn-default","id" =>"searchButton2"]) !!}
				</div>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2" id="staffLabel">ชื่อ</label>
				<label class="col-xs-10" id="staffLabel">ชลัมพล</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">นามสกุล</label>
				<label class="col-xs-10" id="staffLabel">ไก๊ไก่ไก๊ไก่</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">แผนก</label>
				<div class="col-xs-3">{!! Form::select('departmentName', array(
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
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">แพทย์</label>
				<div class="col-xs-3">{!! Form::select('doctorname', array(
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
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">วันนัด</label>
				<div class="col-xs-3">
					<div class="input-group date">
						{!! Form::text('dateOfBirth', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">อาการเบื้องต้น</label>
				<div class="col-xs-4">
						{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5"]) !!}
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-6">
		        	{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
		        </div>
			</div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@stop
