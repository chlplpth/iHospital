@extends('layout/doctorLayout')
@section('css')
<link href="{{asset('css/doctor.css')}}" rel="stylesheet">
{!! HTML::script('js/doctor.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/editDoctorProfile')) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติส่วนตัว</h3>
  </div>
  <div class="panel-body">
    <div id ="doctorProfile">
      <div class="row">
        <div class="col-md-4"> <span class="bold">ชื่อ : </span> <span id='doctorName'>{{ $doctor->name() }}</span>
        </div>
        <div class="col-md-8"><span class="bold">นามสกุล : </span> <span id='doctorSurname'>{{ $doctor->surname() }}</span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4"> <span class="bold">แผนก : </span> <span id='doctorDepartment'>{{ $doctor->department()->departmentName }}</span> <span id='departmentDropdown' style='display:none'>{!! Form::select('departmentId', $departments, $doctor->department()->departmentId,["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}</span>
        </div>
        <div class="col-md-8"><span class="bold">ความเชี่ยวชาญ : </span> <span id='doctorProficiency'>{{ $doctor->proficiency }}</span>
        </div>
      </div>
      <br>
      <span class="bold">อีเมล : </span> <span id='doctorEmail'>{{ $doctor->email() }}</span>
      <br><br>
      <div id ='editProfileButton'>
        <button class ="btn btn-warning" onClick="editProfile()">แก้ไข</button>
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop