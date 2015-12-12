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
		<div class="form-group row">
			<div class="col-xs-1"></div>
			<div class="col-xs-10">
				
				@if(count($appointments) > 0)
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
								<td>{{ $app->diagDate() }}</td>
								<td>{{ $app->diagTime() }}</td>
								<td>{{ $app->department()->departmentName }}</td>
								<td>{{ $app->doctor()->fullname() }}</td>
								<td >
								{!! Form::open(array('url' => 'cancelAppointment')) !!}
									{!! Form::hidden('appointmentId', $app->appointmentId) !!}
									{!! Form::submit('เลื่อน', ['class' => 'btn btn-warning']) !!}
								{!! Form::close() !!}
								</td>
								<td>
								{!! Form::open(array('url' => 'cancelAppointment')) !!}
									{!! Form::hidden('appointmentId', $app->appointmentId) !!}
									{!! Form::submit('ยกเลิก', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				@else
					ไม่มีการนัดหมาย
				@endif
			</div>
			<div class="col-xs-1"></div>
		</div>
	</div>
</div>
@stop