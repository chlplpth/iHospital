@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">เลื่อนการนัดหมาย</h3>
	</div>
	<div class="panel-body">
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
				<label class="col-xs-10" id="patientLabel">โสต นาสิก</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">แพทย์</label>
				<label class="col-xs-10" id="patientLabel">ญานิกา</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">วันนัด</label>
				<div class="col-xs-3">
					<div class="input-group date" id="datepicker">
						{!! Form::text('date', '', ["class" => "form-control"]) !!}
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-xs-2" id="patientLabel">อาการเบื้องต้น</label>
				<label class="col-xs-10" id="patientLabel">ง่อยรับประทาน</label>
			</div>
			

			<!-- Script to construct datepicker -->
			<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
            	$('#datepicker').datepicker();
            });
            </script>
        </div>
        <div class="form-group col-xs-6">
        	{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
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
								<td ><a href="{{ url('/confirmAppointment') }}" class="btn btn-success centerBtn linkBtn">เลือก</a></td>
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
