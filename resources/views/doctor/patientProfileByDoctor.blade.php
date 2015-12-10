@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
	</div>
	<div class="panel-body">
		<div id = "patientProfile">
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span> {{ $patient->hospitalNo }}
			<br> <br>
			
			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span>  {{ $patient->name() }}
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span> {{ $patient->surname() }} 
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class="bold">เพศ : </span> {{ $patient->sex }}
				</div>
				<div class ="col-md-2">
					<span class="bold">กรุ๊ปเลือด : </span> {{ $patient->bloodGroup }}
				</div>	
				<div class ="col-md-8">
					<span class="bold">วัน/เดือน/ปี เกิด : </span> {{ $patient->dateOfBirth }}
				</div>
			</div>

			<br>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">ประวัติการรักษา</h3>
				</div>
				<div class="panel-body">
					<form>
						<div class="form-group row">
							<div class="col-xs-12">
								@if(count($appointments) > 0)
								<table class="table table-bordered">
									<thead >
										<br>
										<tr>
											<th style="width: 15%; text-align:center;">วัน/เดือน/ปี</th>
											<th style="width: 20%; text-align:center;">แผนก</th>
											<th style="width: 50%; text-align:center;">แพทย์</th>
											<th style="width: 15%; text-align:center;">ดูผลการตรวจ</th>
										</tr>
									</thead>
									<tbody>
										@foreach($appointments as $app)
											<tr>
												<td>{{ $app->diagDate() }}</td>
												<td>{{ $app->department()->departmentName }}</td>
												<td>{{ $app->doctor()->fullname() }}</td>
												<td ><a href="{{ url('/patientDiagRecordByDoctor/' . $app->appointmentId) }}" class="btn btn-warning">ดู</a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
								@else
									ไม่มีประวัติการรักษาของผู้ป่วยท่านนี้
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
@stop