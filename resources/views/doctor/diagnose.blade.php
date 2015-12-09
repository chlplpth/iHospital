@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
{!! HTML::script('js/doctor.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/diagnose')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บันทึกการวินิจฉัยผู้ป่วย</h3>
	</div>
	<div class="panel-body">
		<div id="diagnosisForm">
			<div class="form-group row">  
				<label class="col-xs-2 bold">รหัสผู้ป่วย</label>
				<label class="col-xs-10">1011001010</label>
			</div>
			<div class="form-group row">  
				<label class="col-xs-2 bold">ผู้ป่วย</label>
				<label class="col-xs-10">ชลัมพล ไก๊ไก่ไก๊ไก</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">น้ำหนัก</label>
				<label class="col-xs-10">50 kg</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">ส่วนสูง</label>
				<label class="col-xs-10">150 cm</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">ความดันโลหิต</label>
				<label class="col-xs-10">20/120 mmph</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">อัตราการเต้นของหัวใจ</label>
				<label class="col-xs-10">70 bpm</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รหัสโรค</label>
				<div class="col-xs-2">{!! Form::text('disid', '', ["class" => "form-control", 'placeholder' => 'AOE2342']) !!}

				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('disid') )
					<p class="text-danger"> {{ $errors->first('disid') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">ชื่อโรค</label>
				<div class="col-xs-2">{!! Form::text('disname', '', ["class" => "form-control", 'placeholder' => 'นิ่วในถุงน้ำดี']) !!}</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('disname') )
					<p class="text-danger"> {{ $errors->first('disname') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รายละเอียดการตรวจ</label>
				<div class="col-xs-7">
					{!! Form::textarea('description', '', ["class" => "form-control", "rows" => "5", 'placeholder' => 'ปวดหัว ตัวร้อน เป็นไข้']) !!}
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('description') )
					<p class="text-danger"> {{ $errors->first('description') }} </p> 
					@endif
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">รายการยา
					<div id="addBtn" data-toggle="collapse" data-target="#addMedCollapse" class="glyphicon glyphicon-plus-sign"></div>
				</label>
				<div class="col-xs-7">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width: 5%;">ลำดับ</th>
								<th style="width: 20%;">ชื่อยา</th>
								<th style="width: 5%;">จำนวน</th>
								<th style="width: 5%;">หน่วย</th>
								<th style="width: 35%;">วิธีใช้</th>
							</tr>
						</thead>
						<tbody id = "drugTable">
						</tbody>
					</table>
				</div>
			</div>
			<div id="addMedCollapse" class="collapse form-group row">
				<label class="col-xs-2"></label>
				<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
					<div class="panel-heading">
						<h3 class="panel-title">เพิ่มรายการยา</h3>
					</div>
					<div class="panel-body form" style="margin-left:40px; margin-top:10px;">

						<div class="form-group row">
							<label class="col-xs-3 bold">ชื่อยา</label>
							<label class="col-xs-4">{!! Form::text('medicineName', '', ['class' => 'form-control','id'=>'medicineName','onkeyup'=>'enAddMedButton()']) !!}</label>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">จำนวน</label>
							<div class="col-xs-2">
								{!! Form::text('quantity', '', ['class' => 'form-control','id'=>'quantity']) !!}
							</div>
							<div class="col-xs-2">
								{!!Form::select('unit', array('0' => 'เม็ด', '1' => 'ขวด'),'0',["class" => "form-control", 'id'=>'unit']);!!}
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">วิธีใช้</label>
							<div class="col-xs-9">
								<input type="checkbox" value="" id='morningCh' onClick='enAddMedButton()'>&nbsp;เช้า
								<input type="checkbox" value="" id='noonCh' onClick='enAddMedButton()'>&nbsp;กลางวัน
								<input type="checkbox" value="" id='eveCh' onClick='enAddMedButton()'>&nbsp;เย็น
								<input type="checkbox" value="" id='niteCh' onClick='enAddMedButton()'>&nbsp;ก่อนนอน<br>
								<input type="checkbox" value="" id ="beforeMealCh" onClick='enAddMedButton()'>&nbsp;ก่อนอาหาร&nbsp;&nbsp;&nbsp;
								<input type="checkbox" value="" id ="afterMealCh" onClick='enAddMedButton()'>&nbsp;หลังอาหาร<br>
								<input type="checkbox" value="" id ="otherCh" onClick='enAddMedButton()'>&nbsp;อื่นๆ&nbsp;{!! Form::text('otherMedInstruction', '', ['class' => 'form-control','id'=>'medOther']) !!}
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">เพิ่มเติม</label>
							<div class="col-xs-7" >{!! Form::textarea('etc', '', ['class' => 'form-control', 'rows' => '3']) !!}</div>
						</div>
						<div class="form-group row">
							<div class="col-xs-8"></div>
							<div class="col-xs-2"><button id="addMed" type="button" class="btn btn-info" onclick="addMedicine()" disabled>เพิ่ม</button></div>
							<div class="col-xs-2"><button data-toggle="collapse" data-target="#addMedCollapse" id="finAddMed" type="button" class="btn btn-success">เสร็จสิ้น</button></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2 bold">วันที่นัดเพิ่ม
					<div id="addBtn" data-toggle="collapse" data-target="#addNewApp" class="glyphicon glyphicon-plus-sign"></div>
				</label>
				<label class="col-xs-7" id="nextAppointment">ยังไม่มีการนัดหมายครั้งต่อไป</label>
			</div>
			<div id="addNewApp" class="collapse form-group row">
				<label class="col-xs-2"></label>
				<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
					<div class="panel-heading">
						<h3 class="panel-title">นัดหมายเพิ่มเติม</h3>
					</div>
					<div class="panel-body form" style="margin-left:40px; margin-top:10px;">
						<div class="form-group row">
							<label class="col-xs-3 bold">วันที่</label>
							<div class="col-xs-4">
								<div class="input-group date">
									{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป','id'=>'date','onChange'=>'enNextApp()']) !!}
									<div class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold" >ช่วงเวลา</label>
							<label class="col-xs-9 radio form-inline" id="nextAppointmentTime">
								<label>{!!Form::radio('time', 'morning', true, ['class' => 'radio-inline', 'id' => 'doctorRadioMorning']);!!}เช้า (9.00-11.30)</label>
								<label>{!!Form::radio('time', 'afternoon', false, ['class' => 'radio-inline', 'id' => 'doctorRadioAfternoon']);!!}บ่าย (13.00-15.30)</label>
							</label>
						</div>
						<div class="form-group row">
							<label class="col-xs-3 bold">เพิ่มเติม</label>
							<div class="col-xs-7" >{!! Form::textarea('etc', '', ['class' => 'form-control', 'rows' => '3','id'=>'nextAppDetail']) !!}</div>
						</div>
						<div class="form-group row">
							<div class="col-xs-8"></div>
							<div>
								<button type="button" class="btn btn-success" onclick= "nextAppointment()" data-toggle="collapse" data-target="#addNewApp" id ="newAppSubmit" disabled>ตกลง</button></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xs-8"></div>
				<div class="col-xs-4">
					{!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
				</div>
			</div>
		</div>
	</div>

	<!-- Script to construct datepicker -->
	<script type="text/javascript">
	    // When the document is ready
	    $(document).ready(function () {
	    	$('#datepicker').datepicker({language:'th-th',format:'dd/mm/yy'});
	    });
	    </script>
	</div>

	{!! Form::close() !!}
	@stop