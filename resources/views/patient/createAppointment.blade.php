@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">

@stop
@section('content')

{!! Form::open(array('url' => '/createAppointment')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body" style="margin-top:2%;">
		<div id = "createAppointmentForm">
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">รหัสประจำตัวผู้ป่วย</label>
				<label class="col-xs-3" id="patientLabel">XXX</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2" id="patientLabel">ชื่อ</label>
				<label class="col-xs-10" id="patientLabel">ชลัมพล</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">นามสกุล</label>
				<label class="col-xs-10" id="patientLabel">ไก๊ไก่ไก๊ไก่</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">แผนก</label>
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
				<label class="col-xs-2" id="patientLabel">แพทย์</label>
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
				<label class="col-xs-2" id="patientLabel">วันนัด</label>
				<div class="col-xs-3">
					<div class="input-group date">
						{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">อาการเบื้องต้น</label>
				<div class="col-xs-10">
					<div id = "symptomArea">
						{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5"]) !!}
						@if( $errors->has('symptom') )<br>
          					<p class="text-danger"> {{ $errors->first('symptom') }} </p> 
        				@endif
					</div>
				</div>
			</div>
			

			<!-- Script to construct datepicker -->
			<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
            	$('#datepicker').datepicker();
            });
            </script>
            <div class="form-group row">
            	<div class="col-xs-10" id = "symptomArea">
            		{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
            		
            	</div>
            </div>
        </div>
        <div class="panel-body">
		<form>
			<div class="form-group row">
				<div class="col-xs-12">
					<table class="table table-bordered centerBtn" id="appointmentTable" style = "text-align:center;">
						<thead >
							<br>
							<tr>
								<th style="width: 16%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 24%;text-align:center;">เวลา</th>
								<th style="width: 26%; text-align:center;">แผนก</th>
								<th style="width: 46%; text-align:center;">แพทย์</th>
								<th style="width: 20%; text-align:center;">นัดหมาย</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2558</td>
								<td>9.00 น. - 12.00 น.</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td ><a href="{{ url('/confirmAppointment') }}" class="btn btn-success centerBtn linkBtn">เลือก</a>
									
								</td>
							</tr>

							<tr>
								<td>21/11/2558</td>
								<td>13.00 น. - 16.00 น.</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td ><a href="{{ url('/confirmAppointment') }}" class="btn btn-success centerBtn linkBtn">เลือก</a></td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
    </div>
</div>

{!! Form::close() !!}
@stop
