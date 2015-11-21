@extends('layout/adminLayout')
@section('css')
<link href="css/admin.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มยา</h3>
  </div>
  <div class="panel-body form" style="margin-left:40px; margin-top:10px;">
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('id', 'รหัสยา'); !!}</div>
      <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('name', 'ชื่อยา'); !!}</div>
      <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('type', 'ประเภทยา'); !!}</div>
      <div class="col-xs-3">{!! Form::select('type', array('eat' => 'รับประทาน', 'touch' => 'ทา', 'drop' => 'หยอด', 'spray' => 'พ่น', 'injection' => 'ฉีด'), null, ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('description', 'รายละเอียดยา'); !!}</div>
      <div class="col-xs-3">{!! Form::textarea('description', '', ["class" => "form-control", 'rows' => '3']) !!}</div>
    </div> 
    <div class="form-group row">
      <div class="col-xs-2"></div>
      <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
    </div>
  </div>
</div>
</div>

{!! Form::close() !!}
@stop