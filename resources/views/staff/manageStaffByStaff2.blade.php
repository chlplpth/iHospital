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
      
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('id', 'รหัสบุคลากร'); !!}</div>
        <div class="col-xs-3">{!! Form::label('id', '123456789'); !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
        <div class="col-xs-3" id ="manageFirstname">{!! Form::label('name', 'ชลัมพล'); !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('surname', 'นามสกุล'); !!}</div>
        <div class="col-xs-3" id ="manageSurname">{!! Form::label('surname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('department', 'แผนก'); !!}</div>
        <div class="col-xs-3" id ="manageDepartment">{!! Form::label('department', 'พยาธิวิทยา'); !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2"></div>
        <div class="col-xs-7" id="manageButton">
          <button type="button" class="btn btn-warning" id="editStaffButton" onClick="editStaff()">แก้ไข</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="deleteStaffButton">ลบ</button>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header" id="modalHeader">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ลบข้อมูลบุคลากร</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('id', 'รหัสบุคลากร'); !!}</div>
          <div class="col-xs-9">{!! Form::label('id', '123456789'); !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
          <div class="col-xs-9">{!! Form::label('name', 'ชลัมพล'); !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('surname', 'นามสกุล'); !!}</div>
          <div class="col-xs-9">{!! Form::label('surname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('department', 'แผนก'); !!}</div>
          <div class="col-xs-9">{!! Form::label('department', 'พยาธิวิทยา'); !!}</div>
        </div>
      </div>
      <div class="modal-footer">
        <span>ยืนยันทำการลบข้อมูลของบุคลากร</span>
        {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop