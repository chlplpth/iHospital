@extends('layout/nurseLayout')
@section('css')
<link href="{{asset('css/nurse.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPatientGeneralDetail2')) !!}
{!! Form::hidden ('patient',$patient->userId)!!}
{!! Form::hidden ('appointmentId', 12)!!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บันทึกข้อมูลทั่วไปของผู้ป่วย</h3>
	</div>
	<div class="panel-body" style="margin-left:40px; margin-top:2%">
		<form role="form">
			<div class="form-group row">  
				<label class="col-xs-2" id="nurseLabel">ชื่อ</label>
				<label class="col-xs-10" id="nurseLabel">{{$patient->name}}</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2" id="nurseLabel">นามสกุล</label>
				<label class="col-xs-10" id="nurseLabel">{{$patient->surname}}</label>
			</div>
			
			<div class="form-group row">
				<label class="col-xs-2" id="nurseLabel">น้ำหนัก</label>
				<div class="col-xs-1">{!! Form::text('weight', '', ["class" => "form-control", 'placeholder' => '80']) !!}
				</div>
				<label class="col-xs-9" id="nurseLabel">กิโลกรัม</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('weight') )
					<p class="text-danger"> {{ $errors->first('weight') }} </p> 
					@endif </div>
				</div>
			<div class="form-group row">
				<label class="col-xs-2" id="nurseLabel">ส่วนสูง</label>
				<div class="col-xs-1">{!! Form::text('height', '', ["class" => "form-control", 'placeholder' => '180']) !!}
				</div>
				<label class="col-xs-9" id="nurseLabel">เซนติเมตร</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('height') )
					<p class="text-danger"> {{ $errors->first('height') }} </p> 
					@endif </div>
				</div>	
					<div class="form-group row">
						<label class="col-xs-2" id="nurseLabel">ความดันโลหิต</label>
						<div class="col-xs-3">
							<div class="row">
								<div class="col-xs-5" style="padding-right:1%;">{!! Form::text('diBlood', '', ["class" => "form-control", 'placeholder' => '120']) !!}</div>
								<label class="col-xs-2" id="nurseLabel" style="text-align: center;">/</label>
								<div class="col-xs-5" style="padding-left:1%">{!! Form::text('sysBlood', '', ["class" => "form-control", 'placeholder' => '80']) !!}</div>
							</div>
						</div>
						<label class="col-xs-6" id="nurseLabel">มิลลิเมตรปรอท</label>
					</div>
					<div class="form-group row">
						<div class="col-xs-2"></div>
						<div class="col-xs-4">
							<div class="row">
								<div class="col-xs-5" style="padding-right:1%;">@if( $errors->has('highBP') )
									<p class="text-danger"> {{ $errors->first('highBP') }} </p> 
									@endif </div>
									<div class="col-xs-5" style="padding-left:1%">@if( $errors->has('lowBP') )
										<p class="text-danger"> {{ $errors->first('lowBP') }} </p> 
										@endif </div>
									</div>

								</div>	</div>
								<div class="form-group row">
									<label class="col-xs-2" id="nurseLabel">อัตราการเต้นหัวใจ</label>
									<div class="col-xs-1">{!! Form::text('heartRate', '', ["class" => "form-control", 'placeholder' => '72']) !!}</div>
									<label class="col-xs-9" id="nurseLabel">ครั้งต่อนาที</label>
								</div>
								<div class="form-group row">
									<div class="col-xs-2"></div>
									<div class="col-xs-10">@if( $errors->has('heartBeat') )
										<p class="text-danger"> {{ $errors->first('heartBeat') }} </p> 
										@endif </div>
									</div>
									<div class="form-group row">
										<label class="col-xs-2" id="nurseLabel">อาการเบื้องต้น</label>
										<div class="col-xs-6">
											{!! Form::textarea('symptom', '', ["class" => "form-control", "rows" => "5", 'placeholder' => 'ปวดหัว ตัวร้อน มีไข้']) !!}
											<br>
											@if( $errors->has('symptom') )
											<p class="text-danger"> {{ $errors->first('symptom') }} </p> 
											@endif 
										</div>
									</div>
									<div class="form-group row" id="buttonGroup">
										<div class="col-xs-8">{!! Form::submit('เสร็จสิ้น', ["class" => "btn btn-success"]) !!}</div>
									</div>
								</form>
							</div>
						</div>

						{!! Form::close() !!}
						@stop