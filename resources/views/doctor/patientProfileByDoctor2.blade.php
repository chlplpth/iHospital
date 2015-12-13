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
			<span class="bold">รหัสประจำตัวผู้ป่วย : </span>{{ $app->patient->hospitalNo }}
			<br> <br>

			<div class="row">
				<div class="col-md-4"> <span class="bold">ชื่อ : </span>{{ $app->patient->name() }}
				</div>
				<div class="col-md-8"><span class="bold">นามสกุล : </span>{{ $app->patient->surname() }}
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
					<span class="bold">อายุ : </span> {{ $app->age() }} 
				</div>
				<br><br>
			</div>
			<div class="row">
				<div class="col-md-4"><span class="bold">แพทย์ : </span>{{ $app->doctor()->fullname() }} 
				</div>
				<div class="col-md-8"><span class="bold">แผนก : </span>{{ $app->department()->departmentName }}
				</div>
			</div>
			<br>

			<div class ="row">
				<div class ="col-md-4">
					<span class="bold">วันที่รับการตรวจ : </span> {{ $app->diagDate() }} 
				</div>
				<div class ="col-md-8">
					<span class="bold">เวลา : </span>{{ $app->diagTime() }} 
				</div>
			</div>

			<br>
			<span class="bold">อาการ : </span> {{ $app->symptom }}
			<br><br>
			<span class="bold">คำแนะนำจากแพทย์ : </span> {{ $diag->doctorAdvice }}
			<br><br>
			@if(count($prescription->medicines) > 0)
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
			@endif	
			
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop
