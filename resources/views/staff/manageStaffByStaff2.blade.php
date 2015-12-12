@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
{!! HTML::script('js/staff.js') !!}
@stop
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>

  </div>
  <div class="panel-body">
    {!! Form::open(array('url' => '/manageStaffEdit')) !!}
    <div id="manageStaffForm">
      
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
        <div class="col-xs-3" id ="manageFirstname">{!! Form::label('name', $staff->name()) !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('surname', 'นามสกุล'); !!}</div>
        <div class="col-xs-3" id ="manageSurname">{!! Form::label('surname', $staff->surname()) !!}</div>
      </div>
      <div class="form-group row">
        <div class="col-xs-2">{!! Form::label('department', 'แผนก'); !!}</div>
        <div class="col-xs-3" id ="manageDepartment"><span id='departmentName'>{!! Form::label('department', $staff->department->departmentName) !!}</span>
        <span id='departmentDropdown' style='display:none'>{!! Form::select('departmentId', $departments, $staff->department->departmentId,["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}</span> 
        </div>
      </div>
      {!! Form::hidden('staffId', $staff->userId) !!}
      <div class="form-group row">
        <div class="col-xs-2"></div>
        <div class="col-xs-7" id="manageButton">
          <button type="button" class="btn btn-warning" id="editStaffButton" onClick="editStaff()">แก้ไข</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="deleteStaffButton">ลบ</button>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
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
      {!! Form::open(array('url' => '/manageStaffDelete')) !!}
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('name', 'ชื่อบุคลากร') !!}</div>
          <div class="col-xs-9">{!! Form::label('name', $staff->name()) !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('surname', 'นามสกุล') !!}</div>
          <div class="col-xs-9">{!! Form::label('surname', $staff->surname()) !!}</div>
        </div>
        <div class="form-group row">
          <div class="col-xs-3">{!! Form::label('department', 'แผนก') !!}</div>
          <div class="col-xs-9">{!! Form::label('department', $staff->department->departmentName) !!}</div>
        </div>
      </div>
      <div class="modal-footer">
        <span>ยืนยันทำการลบข้อมูลของบุคลากร</span>
        {!! Form::hidden('staffId', $staff->userId) !!}
        {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
        <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop