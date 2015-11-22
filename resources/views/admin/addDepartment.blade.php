@extends('layout/adminLayout')
@section('css')
<link href="css/admin.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => '/addDepartment')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มแผนก</h3>
  		</div>
  		<div class="panel-body form" style="margin-left:40px; margin-top:10px;">
  			<div class="form-group row">
          <label class="col-xs-1" style="margin-top: 7px;">ชื่อแผนก</label>
          <div class="col-xs-3">{!! Form::text('department', '', ['class' => 'form-control', 'placeholder'=>'จักษุวิทยา']) !!}
            @if( $errors->has('department') )<br>
                <p class="text-danger"> {{ $errors->first('department') }} </p> 
            @endif
          </div>
          <div class="col-xs-2">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
        </div>
      </div>
    </div>

	{!! Form::close() !!}
@stop