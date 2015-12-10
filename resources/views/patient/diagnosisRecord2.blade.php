@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/diagRecordPdf')) !!}
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ประวัติการรักษา</h3>
	</div>
	<div class="panel-body">
		<div id = "diagnosisRecordWindow">
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span>{{ $app->patient->hospitalNo }}
			<br> <br>

			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span> {{ $app->patient->name() }}
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span> {{ $app->patient->surname() }}
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-2">
					<span class="bold">เพศ : </span> {{ $app->patient->sex }}
				</div>
				<div class ="col-md-2">
					<span class="bold">กรุ๊ปเลือด : </span> {{ $app->patient->bloodGroup }}
				</div>	
				<div class ="col-md-8">
					<span class="bold">อายุ : </span> เดี๋ยวค่อยใส่
				</div>
				<br><br>
			</div>
			<div class="row">
				<div class="col-md-4"><span class="bold">แพทย์ : </span> {{ $app->doctor()->fullname() }} 
				</div>
				<div class="col-md-8"><span class="bold">แผนก : </span> {{ $app->department()->departmentName }}
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-4">
					<span class="bold">วันที่รับการตรวจ : </span> {{ $app->diagDate() }}
				</div>
				<div class ="col-md-8">
					<span class="bold">เวลา : </span> {{ $app->diagTime() }} 
				</div>
			</div>

			<br>
			<span class="bold">อาการ : </span> {{ $app->symptom }}
			<br><br>
			<div class ="row">
				<div class ="col-md-4">
					<span class="bold">น้ำหนัก : </span> {{ $phys->weight }}
				</div>
				<div class ="col-md-4">
					<span class="bold">ส่วนสูง : </span> {{ $phys->height }} 
				</div>
			</div>
			<br>
			<div class ="row">
				<div class ="col-md-4">
					<span class="bold">ความดันโลหิต : {{ $phys->bloodPresure() }}</span>
				</div>
				<div class ="col-md-4">
					<span class="bold">อัตราการเต้นของหัวใจ : </span> {{ $phys->heartRate }}
				</div>
			</div>

			<br>
			<span class="bold">รหัสโรค : </span> {{ $diag->diseaseCode }}
			<br><br>
			<span class="bold">รายละเอียดการวินิจฉัย : </span> {{ $diag->diagnosisDetail }}
			<br><br>
			<span class="bold">คำแนะนำจากแพทย์ : </span> {{ $diag->doctorAdvice }}
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
					@foreach($prescription->medicines as $med)
					<tr>
						<td>{{ $med->medicineName }}</td>
						<td>{{ $med->quantity }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>	
			<div class ="row">
				<div class ="col-md-5"></div>
				<div class ="col-md-2"><a href = "{{ url('/diagRecordPdf') }}" class="btn btn-warning" >ส่งออก</a></div>
				<div class ="col-md-5"></div>
				<br><br>
			</div>
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop
