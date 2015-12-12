@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">เลื่อนการนัดหมาย</h3>
	</div>
	<div class="panel-body">
        {!! Form::open(array('url' => '/delayAppointmentByStaffRequest')) !!}
		<div id = "reschedulePatientAppointmentForm">
			
			<div class="form-group row">
				<label class="col-xs-2">รหัสประจำตัวผู้ป่วย</label>
				<label class="col-xs-3">{{ $appointment->patient->hospitalNo }}</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2">ชื่อ</label>
				<label class="col-xs-10">{{ $appointment->patient->name() }}</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">นามสกุล</label>
					<label class="col-xs-10">{{ $appointment->patient->surname() }}</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แผนก</label>
					<label class="col-xs-10">{{ $appointment->department()->departmentName }}</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แพทย์</label>
					<label class="col-xs-10">{{ $appointment->doctor()->fullname() }}</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">วันนัด</label>
					<div class="col-xs-3">
						<div class="input-group date">
							{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-xs-2">อาการเบื้องต้น</label>
					<label class="col-xs-10">{{ $appointment->symptom }}</label>
				</div>


				<!-- Script to construct datepicker -->
				<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
            	$('#datepicker').datepicker();
            });
            </script>
        </div>
        {!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
        {!! Form::hidden('doctorId', $appointment->doctor()->userId) !!}
        <div class="row">
        	<div class="col-xs-4"></div>
        	<div class="col-xs-2">
        		{!! Form::submit('ยืนยัน', ['class' => 'btn btn-success']) !!}
        	</div>
        	<div class="col-xs-6"></div>
        </div>
        {!! Form::close() !!}

        @if(isset($newApps))
        <div class="panel-body">
        	<div class="row">
        		<div class="col-xs-1"></div>
        		<div class="col-xs-10">
        			
                    @if(count($newApps) == 0)
                        ไม่มีตารางออกตรวจของแพทย์ในวันที่ท่านต้องการ
                    @else
                        <table class="table table-bordered">
            				<thead >
            					<br>
            					<tr>
            						<th style="width: 10%; text-align:center;">วัน/เดือน/ปี</th>
            						<th style="width: 20%; text-align:center;">เวลา</th>
            						<th style="width: 20%; text-align:center;">แผนก</th>
            						<th style="width: 40%; text-align:center;">แพทย์</th>
            						<th style="width: 10%; text-align:center;">นัดหมาย</th>
            					</tr>
            				</thead>
            				<tbody>
                                @foreach($newApps as $app)
            					<tr>
            						<td>{{ $app->diagDate }}</td>
            						<td>{{ $app->diagTime }}</td>
            						<td>{{ $app->department()->departmentName }}</td>
            						<td>{{ $app->doctor()->fullname() }}</td>
            						<td >
                                        {!! Form::open(array('url' => '/confirmReappointmentByStaff')) !!}
                                        {!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
                                        {!! Form::hidden('scheduleId', $app->scheduleId) !!}
                                        {!! Form::submit('เลือก', ["class" => "btn btn-info"]) !!}
                                        {!! Form::close() !!}
                                    </td>
            					</tr>
                                @endforeach
            				</tbody>
            			</table>
                    @endif
        		</div>
        		<div class="col-xs-1"></div>
        	</div>
        	
        </div>
        @endif
    </div>
</div>
@stop
