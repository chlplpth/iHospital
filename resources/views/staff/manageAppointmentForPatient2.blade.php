@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
{!! HTML::script('js/staff.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">จัดการการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "manageAppointmentForm">
			
			<div class="form-group row">
				<div class="col-xs-2 bold">รหัสผู้ป่วย</div>
				<div class="col-xs-2">{{ $patient->hospitalNo }}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2 bold">ผู้ป่วย</div>
				<div class="col-xs-2" id ="patientName">{{ $patient->fullname() }}</div>
			</div>
		
				<span class="bold">รายการนัดหมาย</span>
				<br><br>
		
			<div class="row">
				<div class="col-xs-11">
					<table class="table table-bordered" id="appointmentTable">
						<thead>
							<tr>
								<th style="width: 5%;">ลำดับ</th>
								<th style="width: 10%;">วัน</th>
								<th style="width: 14%;">เวลา</th>
								<th style="width: 19%;">แพทย์</th>
								<th style="width: 10%;">แผนก</th>
								<th style="width: 8%;">เลื่อน</th>
								<th style="width: 8%;">ยกเลิก</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							@foreach($appointments as $app)
								<tr>
									<td>{{ $i }}</td>
									<td name="diagDate[]">{{ $app->diagDate }}</td>
									<td name="diagTime[]">{{ $app->diagTime }}</td>
									<td name="doctorName[]">{{ $app->doctor()->fullname() }}</td>
									<td name="department[]">{{ $app->department()->departmentName }}</td>
									<td><a href ="{{url('/reschedulePatientAppointment')}}" class="btn btn-warning" >เลื่อน</a></td>
									<td>{!! Form::button('ยกเลิก', ["class" => "btn btn-danger", "data-toggle" => "modal", "data-target" => "#myModal","onClick"=>"setDelModal($i)"]) !!}</td>
									<?php $i++; ?>
								</tr>
							@endforeach
						</tbody>
					</table>

					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header" id = "cancelAppintmentModalTitle">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" >ยกเลิกการนัดหมาย</h4>
								</div>
								<div class="modal-body">
									<p>ท่านต้องการยกเลิกการนัดหมายแพทย์ <span id='delDoc'></span> ในวันที่ <span id='delDate'></span> เวลา <span id='delTime'></span> ของ <span id='delName'></span> หรือไม่</p>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-success" data-dismiss="modal" value="ยืนยัน">
									<button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}
@stop