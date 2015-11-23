@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ประวัติการรักษา วันที่ : </h3>
	</div>
	<div class="panel-body">
		<div id = "createAppointmentForm">
			<br>
			<span class ="header">รหัสประจำตัวผู้ป่วย : </span>PatientID 
			<br> <br>

			<div class="row">
				<div class="col-md-4"> <span class ="header">ชื่อ : </span>ชื่อจริง 
				</div>
				<div class="col-md-8"><span class ="header">นามสกุล : </span>นามสกุล
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class ="header">เพศ : </span>ชาย 
				</div>
				<div class ="col-md-2">
					<span class ="header">กรุ๊ปเลือด : </span>O
				</div>	
				<div class ="col-md-8">
					<span class ="header">อายุ : </span> 20 
				</div>
				<br><br>
			</div>
				<div class="row">
					<div class="col-md-4"><span class ="header">แพทย์ : </span>ชลัมพล 
					</div>
					<div class="col-md-8"><span class ="header">แผนก : </span>โปเกม่อนวิทยา
					</div>
				</div>
				<br>

				<div class ="row">
					<div class ="col-md-4">
						<span class ="header">วันที่รับการตรวจ : </span>19/11/2015 
					</div>
					<div class ="col-md-8">
						<span class ="header">เวลา : </span>9.00 น. -12.00 น. 
					</div>
				</div>

				<br>
				<span class ="header">อาการ : </span>ง่อยแดก
				<br><br>
				<span class ="header">คำแนะนำจาแพทย์ : </span>กินยาแล้วไปนอนพัก 
				<br><br>
				<span class ="header">รายการยา</span> 
				<br><br>
				<table class="table table-bordered" id="diagnosisTable" style = "text-align:center;">
						<thead >
							<tr>
								<th style="width: 33%; text-align:center;">ชื่อยา</th>
								<th style="width: 16%; text-align:center;">จำนวน</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>paracetamol</td>
								<td>2 เม็ด</td>
							</tr>
							<tr>
								<td>ยาบ้า</td>
								<td>5 แผง</td>
								</tr>

						</tbody>
					</table>		
				{!! Form::submit('ส่งออก', ["class" => "btn btn-warning"]) !!}
				<br><br>
			</div>
		</div>

	</div>
</div>
@stop
