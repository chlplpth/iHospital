@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
{!! HTML::script('js/pharmacist.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/editPharmacistProfile')) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติส่วนตัว</h3>
  </div>
  <div class="panel-body">
    <div id ="pharmacistProfile">
      <div class="row">
        <div class="col-md-4"> <span class="bold">ชื่อ : </span> <span id='pharmacistName'>{{ $user->name }}</span>
        </div>
        <div class="col-md-8"><span class="bold">นามสกุล : </span> <span id='pharmacistSurname'>{{ $user->surname }}</span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4"> <span class="bold">แผนก : </span> <span id='pharmacistDepartment'>{{ $user->department()->departmentName }} </span> <span id='departmentDropdown' style='display:none'>{!! Form::select('departmentId', $departments, $user->department()->departmentId,["class" => "form-control", "onchange" => "changeDropdown(this)"])!!}</span>
        </div>
        <div class="col-md-8"><span class="bold">อีเมล : </span> <span id='pharmacistEmail'>{{ $user->email }}</span>
        </div>
      </div>
      <br>
      <br>
      <div id ='editProfileButton'>
        <button class ="btn btn-warning" onClick="editProfile()">แก้ไข</button>
      </div>
    </div>

  </div>
</div>

{!! Form::close() !!}
@stop