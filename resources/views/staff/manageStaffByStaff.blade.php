@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
{!! HTML::script('js/staff.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/manageStaffByStaff')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>
  </div>
  <div class="panel-body">
    <div id="manageStaffForm">
      <span class ="bold">ชื่อเจ้าหน้าที่&nbsp;&nbsp;</span>
      <div class="form-group row">
        <div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือรหัสเจ้าหน้าที่" class="form-control"></select></div>
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}
@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/manageStaffByStaff';
</script>