@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">

<!-- for generating dropdown -->
@if(isset($doctor))
	<script>
	doctor = [];
	doctor[0] = "<option value='0'>ไม่ระบุ</option>";
	
	@foreach($doctor as $index => $doc)
		opt = "<option value='0'>ไม่ระบุ</option>";
		@foreach($doc as $d)
		opt = opt + '<option value="' + '{{ $d->userId }}' + '">' + '{{ $d ->name }}' + ' ' + '{{ $d->surname }}' + '</option>';
	@endforeach
	doctor[ {{ $index }} ] = opt;
@endforeach
</script>
<script type="text/javascript" src="{{ asset('js/doctorDepartment.js') }}"></script>
@endif

@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	
	@if(!isset($appointments))
	{!! Form::open(array('url' => 'createAppointmentForPatient')) !!}
	<div class="panel-body">
		<div id = "createAppointmentForm">
			<div class="form-group row">  
				<label class="col-xs-2">ผู้ป่วย</label>
				<label class="col-xs-3">{{ $patient->fullname() }}</label>
				<div class="col-xs-7"><input type="checkbox"  name="walkin" value="" id='walkinPat'>&nbsp;Walk-In</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2">แผนก</label>
				<div class="col-xs-3">{!! Form::select('departmentId', $department,'0',["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2">แพทย์</label>
				<div class="col-xs-3">{!! Form::select('doctorId',[''],'0',["class" => "form-control", "id" => "doctorName"]) !!}</div>   
			</div>
			<div class="form-group row">
				<label class="col-xs-2">วันนัด</label>
				<div class="col-xs-3">
					<div class="input-group date">
						{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปปปป']) !!}
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-xs-2">อาการเบื้องต้น</label>
				<div class="col-xs-4">
					{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5"]) !!}
				</div>
			</div>
			{!! Form::hidden('patientId', $patient->userId) !!}
			<div class="form-group row">
				<div class="col-xs-5"></div>
				<div class="col-xs-1">{!! Form::submit('ยืนยัน', ["class" => "btn btn-success",'id'=>'createAppointmentButton']) !!}
				</div>
				<div class="col-xs-6"></div>
			</div>
			
		</div>
	</div>
	{!! Form::close() !!}
	@endif

	@if(isset($appointments))
        	@if(count($appointments) > 0)
	            <div class="form-group row">
	                <div class="col-xs-1"></div>
	                <div class="col-xs-10">
	                    <table class="table table-bordered" style = "text-align:center;">
	                        <thead >
	                            <tr>
	                                <th style="width: 16%; text-align:center;">วัน/เดือน/ปี</th>
	                                <th style="width: 20%; text-align:center;">เวลา</th>
	                                <th style="width: 17%; text-align:center;">แผนก</th>
	                                <th style="width: 37%; text-align:center;">แพทย์</th>
	                                <th style="width: 10%; text-align:center;">นัดหมาย</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	@foreach($appointments as $app)
		                            <tr>
		                                <td>{{ $app->diagDate }}</td>
		                                <td>{{ $app->diagTime }}</td>
		                                <td>{{ $app->doctor()->department()->departmentName }}</td>
		                                <td>{{ $app->doctor()->fullname() }}</td>
		                                <td >
		                                	{!! Form::open(array('url' => '/confirmAppointmentByStaff')) !!}
			                                	{!! Form::hidden('scheduleId', $app->scheduleId) !!}
			                                	{!! Form::hidden('patientId', $patient->userId) !!}
			                                	{!! Form::hidden('symptom', $symptom) !!}
			                                	{!! Form::hidden('walkin', $walkin) !!}
			                                	{!! Form::submit('เลือก', ['class' => 'btn btn-info']) !!}
		                                	{!! Form::close() !!}
		                                </td>
		                            </tr>
	                            @endforeach
	                        </tbody>
	                    </table>
	                </div>
	                <div class="col-xs-1"></div>
	            </div>
            @endif
       @endif
</div>

@stop
