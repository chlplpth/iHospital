@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
{!! HTML::script('js/pharmacist.js') !!}
@stop
@section('content')
{!! Form::open(array('url' => '/')) !!}
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ประวัติส่วนตัว</h3>
  </div>
  <div class="panel-body">
    <div id ="pharmacistProfile">
      <div class="row">
        <div class="col-md-4"> <span class="bold">ชื่อ : </span> <span id='pharmacistName'>name</span>
        </div>
        <div class="col-md-8"><span class="bold">นามสกุล : </span> <span id='pharmacistSurname'>surname</span>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-4"> <span class="bold">แผนก : </span> <span id='pharmacistDepartment'>department</span>
        </div>
        <div class="col-md-8"><span class="bold">อีเมล : </span> <span id='pharmacistEmail'>email</span>
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