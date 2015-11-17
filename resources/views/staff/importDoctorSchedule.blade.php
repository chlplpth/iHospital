@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">นำเข้าตารางการออกตรวจ</h3>
  		</div>
  		<div class="panel-body">
  			<form role="form">
  				<div class="form-group row">
	  				<div class="col-xs-2">{!! Form::label('name', 'กรอกชื่อหรือรหัสแพทย์'); !!}</div>
	  			</div>
	  			<div class="form-group row">
		    		<div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}</div>
		    		<div class="col-xs-9">{!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}</div>
	    		</div>
	    		<div class="form-group">
	    			<div class="row">
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสแพทย์'); !!}</div>
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('id', '123456789'); !!}</div>
		    		</div>
		    		<div class="row">
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}</div>
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
		    		</div>
		    		<div class="row">
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'นามสกุล'); !!}</div>
			    		<div class="col-xs-2" id="staffLabel">{!! Form::label('lastname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
		    		</div>
		    	</div>
	    		<div class="row">
				    <label class="col-xs-12" for="inputFile">File input</label>
				</div>
				<div class="row">
				    <div class="col-xs-12">{!! Form::file('filename') !!}</div>
	    		</div>
	    		<div class="row">
	    			<p class="col-xs-12 help-block">Import CSV file here.</p>
	    		</div>
	    	</form>
  		</div>
	</div>

	{!! Form::close() !!}
@stop