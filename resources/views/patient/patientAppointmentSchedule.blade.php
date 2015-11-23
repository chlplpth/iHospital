@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ตารางการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<form>
			<div class="form-group row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<table class="table table-bordered" id="appointmentTable" style = "text-align:center;">
						<thead >
							<tr>
								<th style="width: 8%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 20%;text-align:center;">เวลา</th>
								<th style="width: 18%; text-align:center;">แผนก</th>
								<th style="width: 34%; text-align:center;">แพทย์</th>
								<th style="width: 10%; text-align:center;">เลื่อน</th>
								<th style="width: 10%; text-align:center;">ยกเลิก</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2558</td>
								<td>9.00 น. - 12.00 น.</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td ><a href="{{ url('/rescheduleAppointment') }}" class="btn btn-warning">เลื่อน</a></td>
								<td ><a href="{{ url('/cancleAppointment') }}" class="btn btn-danger">ยกเลิก</a></td>
							</tr>
							<tr>
								<td>21/11/2558</td>
								<td>13.00 น. - 16.00 น.</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td ><a href="{{ url('/rescheduleAppointment') }}" class="btn btn-warning">เลื่อน</a></td>
								<td ><a href="{{ url('/cancleAppointment') }}" class="btn btn-danger">ยกเลิก</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-xs-1"></div>
			</div>
		</form>
	</div>
</div>
@stop