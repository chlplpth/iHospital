@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
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
          <div class="col-xs-3">{!! Form::text('departmentName', '', ['class' => 'form-control', 'placeholder'=>'จักษุวิทยา']) !!}
            @if( $errors->has('department') )<br>
                <p class="text-danger"> {{ $errors->first('department') }} </p> 
            @endif
          </div>
          <div class="col-xs-2">{!! Form::submit('เพิ่ม', ["class" => "btn btn-default"]) !!}</div>
        </div>
      </div>
    </div>

	{!! Form::close() !!}
@stop

<!-- array(
          '0' => 'ไม่ระบุ',
          '1' => 'กายวิภาคศาสตร์', 
          '2' => 'กุมารเวชศาสตร์',
          '3' => 'จิตเวชศาสตร์',
          '4' => 'จุลชีววิทยา',
          '5' => 'จักษุวิทยา',
          '6' => 'ชีวเคมี',
          '7' => 'นิติเวชศาสตร์',
          '8' => 'ปรสิตวิทยา',
          '9' => 'พยาธิวิทยา',
          '10' => 'เภสัชวิทยา',
          '11' => 'รังสีวิทยา',
          '12' => 'วิสัญญีวิทยา',
          '13' => 'เวชศาสตร์ชันสูตร',
          '14' => 'เวชศาสตร์ป้องกันและสังคม',
          '15' => 'เวชศาสตร์ฟื้นฟู',
          '16' => 'ศัลยศาสตร์',
          '17' => 'สรีรวิทยา',
          '18' => 'สุติศาสตร์-นารีเวชวิทยา',
          '19' => 'โสต คอ นาสิกวิทยา',
          '20' => 'ออโธปิดิกส์',
          '21' => 'อายุรศาสตร์'); -->