@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
@stop
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ข้อมูลผู้ป่วย</h3>
  </div>
  <div class="panel-body">
    <div id = "patientProfile">
      <span class="bold">รหัสประจำตัวผู้ป่วย : </span> {{ $patient->hospitalNo }}
      <br> <br>
      
      <div class="row">
        <div class="col-md-4"> <span class="bold">ชื่อ : </span>  {{ $patient->name() }}
        </div>
        <div class="col-md-8"><span class="bold">นามสกุล : </span> {{ $patient->surname() }} 
        </div>
      </div>
      <br>

      <div class ="row">
        <div class ="col-md-2">
          <span class="bold">เพศ : </span> {{ $patient->sex }}
        </div>
        <div class ="col-md-2">
          <span class="bold">กรุ๊ปเลือด : </span> {{ $patient->bloodGroup }}
        </div>  
        <div class ="col-md-8">
          <span class="bold">วัน/เดือน/ปี เกิด : </span> {{ $patient->dateOfBirth }}
        </div>
      </div>

      <br>
      <div class="row">
        <div class ="col-md-12">
          <span class="bold">ยาที่แพ้</span> {{ $patient->drugAllergy }}
        </div>
      </div>
    </div>

  </div>
</div>
@stop