@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPrescription')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">บันทึกประวัติการจ่ายยา</h3>
  </div>
  <div class="panel-body">
    <div id="recordPrescriptionForm">

      <div class="row">
        <div class="col-xs-2 bold">รหัสผู้ป่วย</div>
        <div class="col-xs-10">{{ $appointment->patient->hospitalNo }}</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2 bold">ผู้ป่วย</div>
        <div class="col-xs-10"> {{ $appointment->patient->fullname() }}</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2 bold">ประวัติการแพ้ยา</div>
        <div class="col-xs-10"> {{ $appointment->patient->drugAllergy }}</div>
      </div>
      <br>
      <div class="row">
      <div class="col-xs-2 bold">ใบสั่งยา</div>
      <div class="col-xs-9">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 5%;">ลำดับ</th>
              <th style="width: 20%;">ชื่อยา</th>
              <th style="width: 10%;">จำนวน</th>
              <th style="width: 25%;">วิธีใช้</th>
              <th style="width: 20%;">ข้อแนะนำ</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach($prescription->medicines as $med)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $med->medicineName }}</td>
              <td>{{ $med->quantity }}</td>
              <td>{{ $med->instruction }}</td>
              <td>{{ $med->note }}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-8"></div>
        <div class="col-xs-4">
        {!! Form::hidden('prescriptionId', $prescription->prescriptionId) !!}
       {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
      </div>
    </div>
  </div>
</div>
</div>
{!! Form::close() !!}
@stop