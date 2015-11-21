@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ตารางการนัดหมาย</h3>
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
								<th style="width: 10%; text-align:center;">เปลื่ยนแปลง</th>
								<th style="width: 10%; text-align:center;">ยกเลิก</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2558</td>
								<td>9.00 น. - 12.00 น.</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td ><a href="{{ url('/rescheduleAppointment') }}" class="btn btn-warning centerBtn linkBtn">เปลื่ยนแปลง</a></td>
								<td>{!! Form::submit('ยกเลิก', ["class" => "btn btn-danger centerBtn"]) !!}</td>
							</tr>

							<tr>
								<td>21/11/2558</td>
								<td>13.00 น. - 16.00 น.</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td ><a href="{{ url('/rescheduleAppointment') }}" class="btn btn-warning centerBtn linkBtn">เปลื่ยนแปลง</a></td>
								<td>{!! Form::submit('ยกเลิก', ["class" => "btn btn-danger centerBtn"]) !!}</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
@stop