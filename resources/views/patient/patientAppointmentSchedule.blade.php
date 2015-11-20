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
					<table class="table table-bordered">
						<thead>
							<tr>
								<th style="width: 5%;">วัน/เดือน/ปี</th>
								<th style="width: 5%;">เวลา</th>
								<th style="width: 5%;">แผนก</th>
								<th style="width: 5%;">แพทย์</th>
								<th style="width: 5%;">เลื่อน</th>
								<th style="width: 5%;">ยกเลิกการนัด</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2015</td>
								<td>9.00 - 12.00</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td>{!! Form::submit('เลื่อน', ["class" => "btn btn-warning"]) !!}</td>
								<td>{!! Form::submit('ยกเลิก', ["class" => "btn btn-danger"]) !!}</td>
							</tr>

							<tr>
								<td>21/11/2015</td>
								<td>13.00 - 16.00</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td>{!! Form::submit('เลื่อน', ["class" => "btn btn-warning"]) !!}</td>
								<td>{!! Form::submit('ยกเลิก', ["class" => "btn btn-danger"]) !!}</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
@stop