@extends('layout/doctorLayout')
@section('css')
<link href="css/doctor.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">รายชื่อผู้ป่วยที่นัด</h3>
  		</div>
  		<div class="panel-body" style="margin-top: 10px;">
        <form role="form">
            <div class="row">
              <div class="col-xs-2" id="doctorLabel">{!! Form::label('date', 'วันที่'); !!}</div>
              <div class="col-xs-10" id="doctorLabel">{!! Form::label('date', '5 สิงหาคม พ.ศ.2536'); !!}</div>
            </div>
            <div class="row">
              <div class="col-xs-2" id="doctorLabel">{!! Form::label('date', 'เวลา'); !!}</div>
              <div class="col-xs-10" id="doctorLabel">{!! Form::label('date', '9.00 - 12.00 น.'); !!}</div>
              <div class="col-xs-2" id="doctorLabel">{!! Form::label('date', 'รายการนัดหมาย'); !!}</div>
            </div>
            <div class="row">
	          <div class="col-xs-12">
	              <table class="table table-bordered table-hover">
	                <thead>
	                  <tr>
	                    <th style="width: 5%;">ลำดับ</th>
	                    <th style="width: 10%;">รหัสผู้ป่วย</th>
	                    <th style="width: 20%;">ชื่อผู้ป่วย</th>
	                    <th style="width: 20%;">นามสกุลผู้ป่วย</th>
	                    <th style="width: 45%;">อาการเบื้องต้น</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <tr>
	                    <td>1</td>
	                    <td>11111111</td>
	                    <td>John</td>
	                    <td>Doe</td>
	                    <td>ป่วย</td>
	                  </tr>
	                  <tr>
	                    <td>2</td>
	                    <td>22222222</td>
	                    <td>Mary</td>
	                    <td>Moe</td>
	                    <td>เจ็บ</td>
	                  </tr>
	                  <tr>
	                    <td>3</td>
	                    <td>33333333</td>
	                    <td>July</td>
	                    <td>Dooley</td>
	                    <td>แอ้ก</td>
	                  </tr>
	                </tbody>
	              </table>
	            </div>
            </div>
        </form>

  		</div>
	</div>

	{!! Form::close() !!}
@stop