@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">จัดการการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<form role="form">
			<div class="form-group">
				<div class="row">
					<div class="col-xs-2">{!! Form::label('name', 'กรอกชื่อหรือรหัสผู้ป่วย'); !!}</div>
				</div>
				<div class="row">
					<div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}</div>
					<div class="col-xs-9">{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
					<div class="col-xs-2" id="staffLabel">{!! Form::label('id', '12345678'); !!}</div>
				</div>
				<div class="row">
					<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
					<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
				</div>
				<div class="row">
					<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
					<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('appointmentList', 'รายการนัดหมาย'); !!}</div>
				<div class="col-xs-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 5%;">ลำดับ</th>
								<th style="width: 10%;">วัน-เวลา</th>
								<th style="width: 20%;">ชื่อแพทย์</th>
								<th style="width: 20%;">นามสกุลแพทย์</th>
								<th style="width: 10%;">แผนก</th>
								<th style="width: 10%;">รายละเอียด</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>01-10-2558</td>
								<td>John</td>
								<td>Doe</td>
								<td>หู</td>
								<td>{!! Form::submit('เพิ่มเติม', ["class" => "btn btn-info", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
							</tr>
							<tr>
								<td>2</td>
								<td>01-10-2558</td>
								<td>Mary</td>
								<td>Moe</td>
								<td>ตา</td>
								<td>{!! Form::submit('เพิ่มเติม', ["class" => "btn btn-info", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
							</tr>
							<tr>
								<td>3</td>
								<td>01-10-2558</td>
								<td>July</td>
								<td>Dooley</td>
								<td>จมูก</td>
								<td>{!! Form::submit('เพิ่มเติม', ["class" => "btn btn-info", "data-toggle" => "modal", "data-target" => "#myModal"]) !!}</td>
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
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>

{!! Form::close() !!}
@stop