@extends('layout/patientLayout')
@section('css')
<link href="{{asset('css/patient.css')}}" rel="stylesheet">

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

<!-- ------------------------ -->

@stop

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	
	<div class="panel-body" style="margin-top:2%;">

		@if(!isset($appointments))
			{!! Form::open(array('url' => '/createAppointmentRequest')) !!}
			<div id = "createAppointmentForm">
				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">แผนก</label>
					<div class="col-xs-3">{!! Form::select('departmentId', $department,'0',["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}
					</div>
				</div>

				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">ชื่อแพทย์</label>
					<div class="col-xs-3">{!! Form::select('doctorId',[''],'0',["class" => "form-control", "id" => "doctorName"]) !!}
						</div>
					
				</div>
				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">วันนัด</label>
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
					<label class="col-xs-2" id="patientLabel">อาการเบื้องต้น</label>
					<div class="col-xs-10">
						<div id = "symptomArea">
							{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5", 'placeholder'=>'ปวดหัว ตัวร้อน ไข้ขึ้น']) !!}
							@if( $errors->has('symptom') )<br>
							<p class="text-danger"> {{ $errors->first('symptom') }} </p> 
							@endif
						</div>
					</div>
				</div>
				

				<!-- Script to construct datepicker -->
				<script type="text/javascript">
	            // When the document is ready
	            $(document).ready(function () {
	            	$('#datepicker').datepicker();
	            });
	            </script>
	            <div class="form-group row">
	            	<div class="col-xs-10" id = "symptomArea">
	            		{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
	            	</div>
	            </div>
	        </div>
	        {!! Form::close() !!}
	    @else
	    	<div id = "createAppointmentForm">
				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">แผนก</label>
					<div class="col-xs-3">{{ $input['departmentName'] }}
					</div>
				</div>

				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">ชื่อแพทย์</label>
					<div class="col-xs-3">{{ $input['doctorName'] }}
						</div>
					}
					}
					
				</div>
				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">วันนัด</label>
					<div class="col-xs-3">
						{{ $input['date'] }}
					</div>
				</div>

				<div class="form-group row">
					<label class="col-xs-2" id="patientLabel">อาการเบื้องต้น</label>
					<div class="col-xs-10">
						<div id = "symptomArea">
							{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5", 'placeholder'=>'ปวดหัว ตัวร้อน ไข้ขึ้น']) !!}
							@if( $errors->has('symptom') )<br>
							<p class="text-danger"> {{ $errors->first('symptom') }} </p> 
							@endif
						</div>
					</div>
				</div>
	        </div>
	    @endif
        
        @if(isset($appointments))
        <div class="panel-body">
    		<div class="form-group row">
    			<div class="col-xs-12">
    				<table class="table table-bordered centerBtn" id="appointmentTable" style = "text-align:center;">
    					<thead >
    						<br>
    						<tr>
    							<th style="width: 16%; text-align:center;">วัน/เดือน/ปี</th>
    							<th style="width: 24%;text-align:center;">เวลา</th>
    							<th style="width: 26%; text-align:center;">แผนก</th>
    							<th style="width: 46%; text-align:center;">แพทย์</th>
    							<th style="width: 20%; text-align:center;">นัดหมาย</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($appointments as $app)
	    						<tr>
	    							<td>{{ $app->diagDate }}</td>
	    							<td>{{ $app->diagTime }}</td>
	    							<td>{{ $app->departmentName }}</td>
	    							<td>{{ $app->name }} {{ $app->surname}} </td>
	    							<td ><a href="{{ url('/confirmAppointment') }}" class="btn btn-success centerBtn linkBtn">เลือก</a>

	    							</td>
	    						</tr>
    						@endforeach

    						<tr>
    							<td>21/11/2558</td>
    							<td>13.00 น. - 16.00 น.</td>
    							<td>กุมารเวชรศาสตร์</td>
    							<td>ญานิกา</td>
    							<td ><a href="{{ url('/confirmAppointment') }}" class="btn btn-success centerBtn linkBtn">เลือก</a></td>
    						</tr>

    					</tbody>
    				</table>
    			</div>
    		</div>
        </div>
        @endif
    </div>
</div>
@stop


