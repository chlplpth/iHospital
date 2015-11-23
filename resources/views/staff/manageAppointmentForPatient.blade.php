@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
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
					<table class="table table-bordered">
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
							@foreach($appointments as $app)
							<tr>
								<td>{{ $app->diagDate }}</td>
								<td>{{ $app->diagTime }}</td>
								<td>{{ $app->departmentName }}</td>
								<td>{{ $app->name }} {{ $app->surname }}</td>
								<td ><a href="{{ url('/rescheduleAppointmentByStaff/' . $app->appointmentId ) }}" class="btn btn-warning">เลื่อน</a></td>
								<td ><a href="{{ url('/cancelAppointmentByStaff/' . $app->appointmentId ) }}" class="btn btn-danger">ยกเลิก</a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-xs-1"></div>
			</div>
		</form>
	</div>
</div>
@stop