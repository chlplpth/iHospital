@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">เลื่อนการนัดหมาย</h3>
	</div>
    <div class="panel-body">
        {!! Form::open(array('url' => 'rescheduleAppointmentRequest')) !!}
		<div id = "rescheduleAppointmentForm">
			{!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
			<div class="form-group row">
				<label class="col-xs-2">รหัสประจำตัวผู้ป่วย</label>
				<label class="col-xs-3">{{ $appointment->patient->hospitalNo }}</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2">ชื่อ</label>
				<label class="col-xs-10"> {{ $appointment->patient->name() }}</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">นามสกุล</label>
					<label class="col-xs-10"> {{ $appointment->patient->surname() }} </label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แผนก</label>
					<label class="col-xs-10"> {{ $appointment->department()->departmentName }} </label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แพทย์</label>
					<label class="col-xs-10"> {{ $appointment->doctor()->fullname() }}</label>
                    {!! Form::hidden('doctorId', $appointment->doctor()->userId) !!}
				</div>
				<div class="form-group row">
					<label class="col-xs-2">วันนัด</label>
					<div class="col-xs-3">
						<div class="input-group date">
							@if(isset($requestedDate))
                                {!! Form::text('date', $requestedDate, ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
                            @else
                                {!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
                            @endif
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
        <div class="row">
        	<div class="col-xs-4"></div>
        	<div class="col-xs-2">
        		{!! Form::submit('ยืนยัน', ['class' => 'btn btn-success']) !!}
        	</div>
        	<div class="col-xs-6"></div>
        </div>
        {!! Form::close() !!}

        @if(isset($newAppointments))
            @if(count($newAppointments) > 0)
            <div class="panel-body">
            	<div class="row">
            		<div class="col-xs-1"></div>
            		<div class="col-xs-10">
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
            					
                                @foreach($newAppointments as $schedule)
                                <tr>
                                    <td>{{ $schedule->diagDate }}</td>
                                    <td>{{ $schedule->diagTime }}</td>
                                    <td>{{ $schedule->department()->departmentName }}</td>
                                    <td>{{ $schedule->doctor()->fullname() }}</td>
                                    <td >
                                    {!! Form::open(array('url' => 'confirmReAppointment')) !!}
                                        {!! Form::hidden('appointmentId', $appointment->appointmentId) !!}
                                        {!! Form::hidden('scheduleId', $schedule->scheduleId) !!}
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
            	
            </div>
            @else
                <br>
                ไม่มีตารางออกตรวจของแพทย์ในวันที่ท่านต้องการ
            @endif
        @endif
    </div>
</div>
@stop
