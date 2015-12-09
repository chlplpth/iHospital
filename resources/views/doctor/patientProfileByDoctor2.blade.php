@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ประวัติการรักษา</h3>
	</div>
	<div class="panel-body">
		<div id = "diagnosisRecordWindow">
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span>PatientID 
			<br> <br>

			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span>ชลธร
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span>ขวัญขจรเกียรติ
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class="bold">เพศ : </span>ชาย 
				</div>
				<div class ="col-md-2">
					<span class="bold">กรุ๊ปเลือด : </span>O
				</div>	
				<div class ="col-md-8">
					<span class="bold">อายุ : </span> 20 
				</div>
				<br><br>
			</div>
			<div class="row">
				<div class="col-md-4"><span class="bold">แพทย์ : </span>ชลัมพล 
				</div>
				<div class="col-md-8"><span class="bold">แผนก : </span>เวชกรรม
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-4">
					<span class="bold">วันที่รับการตรวจ : </span>19/11/2015 
				</div>
				<div class ="col-md-8">
					<span class="bold">เวลา : </span>9.00 น. -12.00 น. 
				</div>
			</div>

			<br>
			<span class="bold">อาการ : </span>ไข้สูง
			<br><br>
			<span class="bold">คำแนะนำจากแพทย์ : </span>กินยาแล้วพัก
			<br><br>
			<span class="bold">รายการยา</span> 
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
				</tbody>
			</table>	
			
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop
