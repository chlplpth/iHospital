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
	<div class="panel-body">
		<div id = "manageAppointmentForm">
			
			<div class="form-group row">
				<div class="col-xs-2 bold">รหัสผู้ป่วย</div>
				<div class="col-xs-2">12345678</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2 bold">ผู้ป่วย</div>
				<div class="col-xs-2">ชลัมพล ไก๊ไก่ไก๊ไก่</div>
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
								<th style="width: 20%;">แพทย์</th>
								<th style="width: 15%;">แผนก</th>
								<th style="width: 10%;">เลื่อน</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>01 ต.ค. 58</td>
								<td>09.00 - 11.30 น.</td>
								<td>John Kaikai</td>
								<td>หู</td>
								<td>{!! Form::button('เลื่อน', ["class" => "btn btn-warning", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
							</tr>
							<tr>
								<td>2</td>
								<td>01 ต.ค. 58</td>
								<td>09.00 - 11.30 น.</td>
								<td>Mary Marry</td>
								<td>ตา</td>
								<td>{!! Form::button('เลื่อน', ["class" => "btn btn-warning", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
							</tr>
							<tr>
								<td>3</td>
								<td>01 ต.ค. 58</td>
								<td>13.00 - 15.30 น.</td>
								<td>July Doodo</td>
								<td>จมูก</td>
								<td>{!! Form::button('เลื่อน', ["class" => "btn btn-warning", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
							</tr>
						</tbody>
					</table>

					<!-- Modal -->
					<div class="modal fade" id="myModal" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Modal Header</h4>
								</div>
								<div class="modal-body">
									<p>Some text in the modal.</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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