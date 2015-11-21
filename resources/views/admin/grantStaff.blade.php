@extends('layout/adminLayout')
@section('css')
<link href="css/admin.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ให้สิทธิ์เจ้าหน้าที่</h3>
  </div>
  <div class="panel-body" style="margin-top: 10px; margin-left: 40px;">
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('keyword', 'ชื่อ / รหัสบุคลากร'); !!}</div>
      <div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control"]) !!}</div>
      <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
    </div>
    <div class="form-group row" style="margin-bottom: 0px;">
      <div class="col-xs-9">
        <table id="grantStaff" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 15%;">รหัสประจำตัว</th>
              <th style="width: 20%;">ชื่อ</th>
              <th style="width: 20%;">นามสกุล</th>
              <th style="width: 10%;">บทบาท</th>
              <th style="width: 10%;">สิทธิ์การแก้ไข</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>001</td>
              <td>John</td>
              <td>Doe</td>
              <td>Doctor</td>
              <td><span class="glyphicon glyphicon-ok"></span></td>
            </tr>
            <tr>
              <td>002</td>
              <td>Mary</td>
              <td>Moe</td>
              <td>Nurse</td>
              <td><span class="glyphicon glyphicon-ok"></span></td>
            </tr>
            <tr>
              <td>003</td>
              <td>July</td>
              <td>Dooley</td>
              <td>Staff</td>
              <td><span class="glyphicon glyphicon-remove"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-9" style="padding: 0px;">
        {!! Form::submit('ตกลง', ["class" => "btn btn-success"]) !!}
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop