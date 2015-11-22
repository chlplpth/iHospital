@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>
  </div>
  <div class="panel-body" style="margin-top:2%; margin-left: 40px;">
    <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อ / รหัสบุคลากร'); !!}</div>
      <div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control"]) !!}</div>
      <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสบุคลากร'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('id', '123456789'); !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('surname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
    </div>
    <div class="form-group row">
    	<div class="col-xs-2"></div>
    	<div class="col-xs-2"><button type="button" data-toggle="collapse" data-target="#manage" class="btn btn-info" style="width:100px;">แก้ไข</button></div>
    	<div class="col-xs-1"><button type="button" data-toggle="collapse" data-target="#delete" class="btn btn-danger" style="float: right; width:100px;">ลบ</button></div>
    </div>
    <div id="manage" class="collapse form-group row">
    	<label class="col-xs-2" id="doctorLabel"></label>
    	<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
    		<div class="panel-heading">
    			<h3 class="panel-title">นัดหมายเพิ่มเติม</h3>
    		</div>
    		<div class="panel-body form" style="margin-left:40px; margin-top:2%;">
    			<div class="form-group row">
    				<label class="col-xs-3" id="doctorLabel">วันที่</label>
    				<div class="col-xs-4">
    					<div class="input-group date">
    						{!! Form::text('date', '', ['class' => 'form-control input-medium', 'data-date-language'=>"th-th", 'data-provide'=>"datepicker", 'placeholder'=>'วว/ดด/ปป']) !!}
    						<div class="input-group-addon">
    							<span class="glyphicon glyphicon-calendar"></span>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="form-group row">
    				<label class="col-xs-3" id="doctorLabel">ช่วงเวลา</label>
    				<label class="col-xs-9 radio form-inline" id="doctorLabel" style="margin-left: px; padding: 0px;">
    					<label style="margin-left: 17px;">{!!Form::radio('time', 'morning', true, ['class' => 'radio-inline', 'id' => 'doctorRadio']);!!}เช้า (9.00-11.30)</label>
    					<label style="margin-left: 50px;">{!!Form::radio('time', 'afternoon', true, ['class' => 'radio-inline', 'id' => 'doctorRadio']);!!}บ่าย (13.00-15.30)</label>
    				</label>
    			</div>
    			<div class="form-group row">
    				<label class="col-xs-3" id="doctorLabel">เพิ่มเติม</label>
    				<div class="col-xs-7" id="doctorLabel">{!! Form::textarea('etc', '', ['class' => 'form-control', 'rows' => '3']) !!}</div>
    			</div>
    			<div class="form-group row">
    				<div class="col-xs-10"><button style="float: right;" type="button" class="btn btn-success">ตกลง</button></div>
    			</div>
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
</div>
</div>
{!! Form::close() !!}
@stop