@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ประวัติการตรวจ</h3>
	</div>
	<div class="panel-body">
		<form>
			<div class="form-group row">
				<div class="col-xs-12">
					<table class="table table-bordered centerBtn" id="appointmentTable" style = "text-align:center;">
						<thead >
							<tr>
								<th style="width: 13%; text-align:center;">วัน/เดือน/ปี</th>
								<th style="width: 13%; text-align:center;">แผนก</th>
								<th style="width: 25%; text-align:center;">แพทย์</th>
								<th style="width: 10%; text-align:center;">ดูผลการตรวจ</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>20/11/2558</td>
								<td>จักษุวิทยา</td>
								<td>กรภพ</td>
								<td >{!! Form::submit('ดู', ["class" => "btn btn-warning centerBtn"]) !!}</t>
							</tr>

							<tr>
								<td>21/11/2558</td>
								<td>กุมารเวชรศาสตร์</td>
								<td>ญานิกา</td>
								<td>{!! Form::submit('ดู', ["class" => "btn btn-warning centerBtn"]) !!}</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</form>
	</div>
</div>
@stop