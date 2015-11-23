@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => '/diagnose')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">บันทึกการวินิจฉัยผู้ป่วย</h3>
  		</div>
  		<div class="panel-body" style="margin-left:40px;">
  			<form role="form">
  				<div class="form-group row">  
			        <label class="col-xs-2" id="doctorLabel">รหัสผู้ป่วย</label>
			        <label class="col-xs-10" id="doctorLabel">1011001010</label>
			    </div>
		        <div class="form-group row">  
			        <label class="col-xs-2" id="doctorLabel">ชื่อ</label>
			        <label class="col-xs-10" id="doctorLabel">ชลัมพล</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">นามสกุล</label>
			        <label class="col-xs-10" id="doctorLabel">ไก๊ไก่ไก๊ไก่</label>
			    </div>
			    <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">รหัสโรค</label>
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
		        	<label class="col-xs-2" id="doctorLabel">ชื่อโรค</label>
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
			        <label class="col-xs-2" id="doctorLabel">รายละเอียดการตรวจ</label>
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
		        	<label class="col-xs-2" id="doctorLabel">รายการยา
		        		<div id="addBtn" data-toggle="collapse" data-target="#addMed" class="glyphicon glyphicon-plus-sign"></div>
		        	</label>
		        	<div class="col-xs-7">
		        		<table class="table table-bordered table-hover">
		        			<thead>
		        				<tr>
		        					<th style="width: 5%;">ลำดับ</th>
		        					<th style="width: 10%;">รหัสยา</th>
		        					<th style="width: 20%;">ชื่อยา</th>
		        					<th style="width: 5%;">จำนวน</th>
		        					<th style="width: 5%;">หน่วย</th>
		        					<th style="width: 35%;">วิธีใช้</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        				<tr>
		        					<td>1</td>
		        					<td>001</td>
		        					<td>พาราเซตาม่อง</td>
		        					<td>10</td>
		        					<td>เม็ด</td>
		        					<td>ดม</td>
		        				</tr>
		        				<tr>
		        					<td>2</td>
		        					<td>002</td>
		        					<td>ไวอากร้า</td>
		        					<td>2</td>
		        					<td>ขวด</td>
		        					<td>แดก</td>
		        				</tr>
		        				<tr>
		        					<td>3</td>
		        					<td>003</td>
		        					<td>เบตาดีน</td>
		        					<td>32</td>
		        					<td>ช้อน</td>
		        					<td>ทา</td>
		        				</tr>
		        			</tbody>
		        		</table>
		        	</div>
		        </div>
		        <div id="addMed" class="collapse form-group row">
		        	<label class="col-xs-2" id="doctorLabel"></label>
		        	<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
		        		<div class="panel-heading">
		        			<h3 class="panel-title">เพิ่มรายการยา</h3>
		        		</div>
		        		<div class="panel-body form" style="margin-left:40px; margin-top:10px;">
		        			<div class="form-group row">
		        				<label class="col-xs-3" id="doctorLabel">รหัสหรือชื่อยา</label>
		        				<div class="col-xs-5">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
		        				<div class="col-xs-2">{!! Form::submit('ค้นหา', ["class" => "btn btn-default", 'id' => 'buttonGroup']) !!}</div>
		        			</div>
		        			<div class="form-group row">
		        				<label class="col-xs-3" id="doctorLabel">รหัสยา</label>
		        				<label class="col-xs-4" id="doctorLabel">-</label>
		        			</div>
		        			<div class="form-group row">
		        				<label class="col-xs-3" id="doctorLabel">ชื่อยา</label>
		        				<label class="col-xs-4" id="doctorLabel">-</label>
		        			</div>
		        			<div class="form-group row">
		        				<label class="col-xs-3" id="doctorLabel">จำนวน</label>
		        				<div class="col-xs-2">
		        					{!! Form::text('quantity', '', ["class" => "form-control"]) !!}
		        				</div>
		        				<div class="col-xs-2">
		        					{!!Form::select('unit', array('0' => 'เม็ด', '1' => 'ขวด'),'0',["class" => "form-control", 'style' => 'float: rigth;']);!!}
		        				</div>
		        			</div>
		        			<div class="form-group row">
		        				<label class="col-xs-3" id="doctorLabel">วิธีใช้</label>
		        				<label class="col-xs-9 row checkbox" id="doctorLabel" style="margin-left: 15px; padding: 0px;">
		        					<label class="col-xs-2"><input type="checkbox" value="">เช้า</label>
		        					<label class="col-xs-3"><input type="checkbox" value="">กลางวัน</label>
		        					<label class="col-xs-2"><input type="checkbox" value="">เย็น</label>
		        					<label class="col-xs-3"><input type="checkbox" value="">ก่อนนอน</label>
		        					<!-- <label class="col-xs-5"><input type="checkbox" value="">อื่นๆ</label> -->
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
		        <div class="form-group row">
			        <label class="col-xs-2" id="doctorLabel">วันที่นัดเพิ่ม
			        	<div id="addBtn" data-toggle="collapse" data-target="#addNewApp" class="glyphicon glyphicon-plus-sign"></div>
			        </label>
			        <label class="col-xs-7" id="doctorLabel">วันที่ 5 สิงหาคม พ.ศ.2558 (13.00 - 15.30)</label>
		        </div>
	        	<div id="addNewApp" class="collapse form-group row">
		        	<label class="col-xs-2" id="doctorLabel"></label>
		        	<div class=" col-xs-7 panel panel-default" style="padding: 0px;">
		        		<div class="panel-heading">
		        			<h3 class="panel-title">นัดหมายเพิ่มเติม</h3>
		        		</div>
		        		<div class="panel-body form" style="margin-left:40px; margin-top:10px;">
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
	        	<div class="form-group row">
		        	<div class="col-xs-9">
	        			{!! Form::submit('ยืนยัน', ["class" => "btn btn-success", 'id' => 'buttonGroup']) !!}
	        		</div>
	        	</div>
	        </form>
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