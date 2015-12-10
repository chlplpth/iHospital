@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">เลื่อนการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "reschedulePatientAppointmentForm">
			
			<div class="form-group row">
				<label class="col-xs-2">รหัสประจำตัวผู้ป่วย</label>
				<label class="col-xs-3">XXX</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2">ชื่อ</label>
				<label class="col-xs-10">ชลัมพล</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">นามสกุล</label>
					<label class="col-xs-10">ไก๊ไก่ไก๊ไก่</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แผนก</label>
					<label class="col-xs-10">โสต นาสิก</label>
				</div>
				<div class="form-group row">
					<label class="col-xs-2">แพทย์</label>
					<label class="col-xs-10">ญานิกา</label>
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
					<label class="col-xs-10">ง่อยรับประทาน</label>
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
        					<tr>
        						<td>20/11/2558</td>
        						<td>9.00 น. - 12.00 น.</td>
        						<td>จักษุวิทยา</td>
        						<td>กรภพ</td>
        						<td ><a href="{{ url('/confirmAppointmentForPatient') }}" class="btn btn-info">เลือก</a></td>
        					</tr>

        					<tr>
        						<td>21/11/2558</td>
        						<td>13.00 น. - 16.00 น.</td>
        						<td>กุมารเวชรศาสตร์</td>
        						<td>ญานิกา</td>
        						<td ><a href="{{ url('/confirmAppointmentForPatient') }}" class="btn btn-info">เลือก</a></td>
        					</tr>
        				</tbody>
        			</table>
        		</div>
        		<div class="col-xs-1"></div>
        	</div>
        	
        </div>
    </div>
</div>

{!! Form::close() !!}
@stop
