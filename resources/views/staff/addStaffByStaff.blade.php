@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => '/addStaffByStaff')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มบุคลากร</h3>
  		</div>
  		<div class="panel-body" style="margin-left: 40px; margin-top:2%;">
	        <form role="form">
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}
	              	@if( $errors->has('name') )<br>
						<p class="text-danger"> {{ $errors->first('name') }} </p> 
						@endif
	              </div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('surname', '', ["class" => "form-control"]) !!}
	              		@if( $errors->has('surname') )<br>
						<p class="text-danger"> {{ $errors->first('surname') }} </p> 
						@endif
	              </div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('userType', 'บทบาท'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('userType', array('doctor' => 'แพทย์', 'nurse' => 'พยาบาล', 'staff' => 'เจ้าหน้าที่', 'phamacist' => 'เภสัชกร', 'admin' => 'ผู้ดูแลระบบ'), null, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">

	              {!! Form::label('departmentId', 'แผนก'); !!}</div>
	              <div class="col-xs-3">{!! Form::select('departmentId', $department, null, ["class" => "form-control"]) !!}</div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('username', 'ชื่อผู้ใช้'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('username', '', ["class" => "form-control"]) !!}
	              	@if( $errors->has('username') )<br>
						<p class="text-danger"> {{ $errors->first('username') }} </p> 
						@endif
	              </div>
	            </div>
	            <div class="form-group row">
	              <div class="col-xs-1" id="staffLabel">{!! Form::label('email', 'อีเมล'); !!}</div>
	              <div class="col-xs-3">{!! Form::text('email', '', ["class" => "form-control"]) !!}
	              		@if( $errors->has('email') )<br>
						<p class="text-danger"> {{ $errors->first('email') }} </p> 
						@endif
	              </div>
	            </div> 
	            <div class="form-group row">
	              <div class="col-xs-1"></div>
	              <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
	            </div>
	        </form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop