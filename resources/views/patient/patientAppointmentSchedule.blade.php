@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

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
							<tr>
								<th style="width: 8%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 12%;text-align:center;">เวลา</th>
								<th style="width: 13%; text-align:center;">แผนก</th>
								<th style="width: 23%; text-align:center;">แพทย์</th>
								<th style="width: 5%; text-align:center;">เลื่อน</th>
								<th style="width: 5%; text-align:center;">ยกเลิกการนัด</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2558</td>
								<td>9.00 น. - 12.00 น.</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td >{!! Form::submit('เลื่อน', ["class" => "btn btn-warning centerBtn"]) !!}</td>
								<td>{!! Form::submit('ยกเลิก', ["class" => "btn btn-danger centerBtn"]) !!}</td>
							</tr>

							<tr>
								<td>21/11/2558</td>
								<td>13.00 น. - 16.00 น.</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td>{!! Form::submit('เลื่อน', ["class" => "btn btn-warning centerBtn"]) !!}</td>
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