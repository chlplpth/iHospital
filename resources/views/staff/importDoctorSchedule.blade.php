@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/importDoctorSchedule')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">นำเข้าตารางการออกตรวจ</h3>
	</div>
	<div class="panel-body" style="margin-left:40px; margin-top:2%;">
		<form role="form">
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อหรือรหัสแพทย์'); !!}</div>
				<div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control", 'placeholder'=>'ณภัทร / 12345678']) !!}
					@if( $errors->has('keyword') )<br>
						<p class="text-danger"> {{ $errors->first('keyword') }} </p> 
						@endif
				</div>
				<div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('id', '12345678'); !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
				<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="staffLabel">ตั้งแต่วันที่</label>
				<div class="col-xs-3">
					<div class="input-group date">
						{!! Form::text('startDate', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}	
						<span class="input-group-addon" style="font-weight: bold;">ถึง</span>
						{!! Form::text('endDate', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
					</div>
				</div>
			</div>
			<div class="form-group row">
					<div class="col-xs-2"></div>
					<div class="col-xs-3">@if( $errors->has('startDate') )
						<p class="text-danger"> {{ $errors->first('startDate') }} </p> 
						@endif 
					@if( $errors->has('endDate') )
						<p class="text-danger"> {{ $errors->first('endDate') }} </p> 
						@endif </div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2" id="staffLabel">{!! Form::label('day', 'วันออกตรวจ'); !!}</div>
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
								<td>{!! Form::checkbox('m1', 1, true) !!}</td>
								<td>{!! Form::checkbox('m2', 1, true) !!}</td>
								<td>{!! Form::checkbox('m3', 1, true) !!}</td>
								<td>{!! Form::checkbox('m4', 1, true) !!}</td>
								<td>{!! Form::checkbox('m5', 1, true) !!}</td>
								<td>{!! Form::checkbox('m6', 1, true) !!}</td>
								<td>{!! Form::checkbox('m7', 1, true) !!}</td>
							</tr>
							<tr>
								<th>บ่าย</th>
								<td>{!! Form::checkbox('a1', 1, true) !!}</td>
								<td>{!! Form::checkbox('a2', 1, true) !!}</td>
								<td>{!! Form::checkbox('a3', 1, true) !!}</td>
								<td>{!! Form::checkbox('a4', 1, true) !!}</td>
								<td>{!! Form::checkbox('a5', 1, true) !!}</td>
								<td>{!! Form::checkbox('a6', 1, true) !!}</td>
								<td>{!! Form::checkbox('a7', 1, true) !!}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-9">
					{!! Form::submit('ตกลง', ["class" => "btn btn-success"]) !!}
				</div>
			</div>
		</form>
	</div>
</div>

{!! Form::close() !!}
@stop