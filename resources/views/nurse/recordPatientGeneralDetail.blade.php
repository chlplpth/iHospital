@extends('layout/nurseLayout')
@section('css')
<link href="{{asset('css/nurse.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPatientGeneralDetail')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">บันทึกข้อมูลทั่วไปของผู้ป่วย</h3>
	</div>
	<div class="panel-body" style="">
		<div id="recordGeneralData">
			<div class="form-group row">
				<div class="col-xs-2" id="nurseLabel">{!! Form::label('hospitalId', 'รหัสผู้ป่วย') !!}</div>

				<div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือรหัสแพทย์" class="form-control"></select></div>
				<div class="col-xs-7">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
			
						{!! Form::close() !!}
						@stop

			<div class="form-group row">  
				<label class="col-xs-2">ชื่อ</label>
				<label class="col-xs-10">ชลัมพล</label>
			</div>
			<div class="form-group row">
				<label class="col-xs-2">นามสกุล</label>
				<label class="col-xs-10">ไก๊ไก่ไก๊ไก่</label>
			</div>
			
			<div class="form-group row">
				<label class="col-xs-2">น้ำหนัก</label>
				<div class="col-xs-1">{!! Form::text('weight', '', ["class" => "form-control", 'placeholder' => '80']) !!}
				</div>
				<label class="col-xs-9">กิโลกรัม</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('weight') )
					<p class="text-danger"> {{ $errors->first('weight') }} </p> 
					@endif 
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2">ส่วนสูง</label>
				<div class="col-xs-1">{!! Form::text('height', '', ["class" => "form-control", 'placeholder' => '180']) !!}
				</div>
				<label class="col-xs-9">เซนติเมตร</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('height') )
					<p class="text-danger"> {{ $errors->first('height') }} </p> 
					@endif 
				</div>
			</div>	
			<div class="form-group row">
				<label class="col-xs-2">ความดันโลหิต</label>
				<div class="col-xs-3">
					<div class="row">
						<div class="col-xs-5" style="padding-right:1%;">{!! Form::text('highBP', '', ["class" => "form-control", 'placeholder' => '120']) !!}</div>
						<label class="col-xs-2" style="text-align: center;">/</label>
						<div class="col-xs-5" style="padding-left:1%">{!! Form::text('lowBP', '', ["class" => "form-control", 'placeholder' => '80']) !!}</div>
					</div>
				</div>
				<label class="col-xs-6">มิลลิเมตรปรอท</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-4">
					<div class="row">
						<div class="col-xs-5" style="padding-right:1%;">@if( $errors->has('highBP') )
							<p class="text-danger"> {{ $errors->first('highBP') }} </p> 
							@endif 
						</div>
						<div class="col-xs-5" style="padding-left:1%">@if( $errors->has('lowBP') )
							<p class="text-danger"> {{ $errors->first('lowBP') }} </p> 
							@endif 
						</div>
					</div>
				</div>	
			</div>
			<div class="form-group row">
				<label class="col-xs-2">อัตราการเต้นหัวใจ</label>
				<div class="col-xs-1">{!! Form::text('heartBeat', '', ["class" => "form-control", 'placeholder' => '72']) !!}</div>
				<label class="col-xs-9">ครั้งต่อนาที</label>
			</div>
			<div class="form-group row">
				<div class="col-xs-2"></div>
				<div class="col-xs-10">@if( $errors->has('heartBeat') )
					<p class="text-danger"> {{ $errors->first('heartBeat') }} </p> 
					@endif 
				</div>
			</div>
			<div class="form-group row">
				<label class="col-xs-2">อาการเบื้องต้น</label>
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
		</div>
	</div>
</div>

{!! Form::close() !!}
@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/nurseRecord';
</script>
