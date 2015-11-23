@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">จัดการการนัดหมาย</h3>
	</div>
	<div class="panel-body" style="margin-top:2%; margin-left:40px;">
		<form role="form">
			<div class="form-group row">
				<div class="col-xs-2">{!! Form::label('name', 'ชื่อ / รหัสผู้ป่วย'); !!}</div>
				<div class="col-xs-3" >{!! Form::text('name', '', ["class" => "form-control", 'placeholder'=>'ชื่อ / รหัสผู้ป่วย']) !!}</div>
				<div class="col-xs-6" >{!! Form::submit('ค้นหา', ["class" => "btn btn-info"]) !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2">{!! Form::label('id', 'รหัสผู้ป่วย'); !!}</div>
				<div class="col-xs-2">{!! Form::label('id', '12345678'); !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2">{!! Form::label('name', 'ชื่อ'); !!}</div>
				<div class="col-xs-2">{!! Form::label('name', 'ชลัมพล'); !!}</div>
			</div>
			<div class=" form-group row">
				<div class="col-xs-2">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
				<div class="col-xs-2">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
			</div><br>
			<div class="form-group row">
				<div class="col-xs-2">{!! Form::label('appointmentList', 'รายการนัดหมาย'); !!}</div>
			</div>
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
								<td>{{ 20/11/2558 }}</td>
								<td>{{ $app->diagTime }}</td>
								<td>{{ $app->departmentName }}</td>
								<td>{{ $app->name }} {{ $app->surname }}</td>
								<td ><a href="{{ url('/rescheduleAppointmentByStaff') }}" class="btn btn-warning">เลื่อน</a></td>
								<td ><button class="btn btn-danger">ยกเลิก</button></td>
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

<script type="text/javascript">
	$(document).ready(function () {
		$('.btn-danger').click(function() {
			swal({   title: "ต้องการลบการนัดหมายนี้หรือไม่",   text: "หากยืนยันรการนัดหมายนี้จะถูกลบทันที",   type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "ยืนยัน",   closeOnConfirm: true });
		});
	});
</script>

{!! Form::close() !!}
@stop