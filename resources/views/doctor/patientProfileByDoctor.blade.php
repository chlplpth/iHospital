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
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span> 
			<br> <br>
			
			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span> 
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span> 
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class="bold">เพศ : </span>
				</div>
				<div class ="col-md-2">
					<span class="bold">กรุ๊ปเลือด : </span> 
				</div>	
				<div class ="col-md-8">
					<span class="bold">วัน/เดือน/ปี เกิด : </span> 
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
										<tr>
											<td>20/11/2558</td>
											<td>จักษุวิทยา</td>
											<td>กรภพ</td>
											<td ><a href="{{ url('/patientProfileByDoctor2') }}" class="btn btn-warning">ดู</a></td>
										</tr>

										<tr>
											<td>21/11/2558</td>
											<td>กุมารเวชรศาสตร์</td>
											<td>ญานิกา</td>
											<td ><a href="{{ url('/patientProfileByDoctor2') }}" class="btn btn-warning">ดู</a></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>
@stop