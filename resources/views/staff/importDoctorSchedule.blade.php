@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">นำเข้าตารางการออกตรวจ</h3>
	</div>
	<div class="panel-body" >
		@if(!isset($doctor))
		<div class="form-group row">
			<!-- <div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อหรือรหัสแพทย์'); !!}</div> -->
			<div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือรหัสแพทย์" class="form-control"></select></div>
		</div>
		@else
		{!! Form::open(array('url' => '/importDoctorSchedule')) !!}
		{!! Form::hidden('doctorId', $doctor->userId) !!}
		<div class="form-group row">
			<div class="col-xs-2">{!! Form::label('name', 'ชื่อ'); !!}</div>
			<div class="col-xs-2">{{ $doctor->name }}</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-2">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
			<div class="col-xs-2">{{ $doctor->surname }}</div>
		</div>
		<div class="form-group row">
			<label class="col-xs-2">ตั้งแต่วันที่</label>
			<div class="col-xs-3">
				<div class="input-group date">
					{!! Form::text('startDate', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
					<span class="input-group-addon" style="font-weight: bold;">ถึง</span>
					{!! Form::text('endDate', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-2">{!! Form::label('day', 'วันออกตรวจ'); !!}</div>
			<div class="col-xs-7">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th style="width: 12.5%;">ช่วงเวลา</th>
							<th style="width: 12.5%;">อาทิตย์</th>
							<th style="width: 12.5%;">จันทร์</th>
							<th style="width: 12.5%;">อังคาร</th>
							<th style="width: 12.5%;">พุธ</th>
							<th style="width: 12.5%;">พฤหัสบดี</th>
							<th style="width: 12.5%;">ศุกร์</th>
							<th style="width: 12.5%;">เสาร์</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>เช้า</th>
							<td>{!! Form::checkbox('m[]', 0, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 1, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 2, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 3, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 4, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 5, true) !!}</td>
							<td>{!! Form::checkbox('m[]', 6, true) !!}</td>
						</tr>
						<tr>
							<th>บ่าย</th>
							<td>{!! Form::checkbox('a[]', 0, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 1, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 2, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 3, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 4, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 5, true) !!}</td>
							<td>{!! Form::checkbox('a[]', 6, true) !!}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-8"></div>
			<div class="col-xs-4">
				{!! Form::submit('ตกลง', ["class" => "btn btn-success"]) !!}
			</div>
		</div>
		{!! Form::close() !!}
		@endif
	</div>
</div>

@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/importDoctorSchedule';
</script>