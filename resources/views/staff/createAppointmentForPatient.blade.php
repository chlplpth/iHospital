@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">

@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">สร้างการนัดหมาย</h3>
	</div>
	<div class="panel-body">
		<div id = "createAppointmentForm">
			<div class="form-group row">
				<!-- <div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อหรือรหัสแพทย์'); !!}</div> -->
				<div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อผู้ป่วย" class="form-control"></select></div>
			</div>
		</div>
	</div>
</div>

{!! Form::close() !!}
@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/staffCreateAppointment';
</script>