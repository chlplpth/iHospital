@extends('layout/pharmacistLayout')
@section('css')
<link href="{{asset('css/pharmacist.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/recordPrescriptionHistory')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">บันทึกประวัติการจ่ายยา</h3>
  </div>
  <div class="panel-body">
    <div id="recordPrescriptionForm">

      <div class="row">
        <div class="col-xs-2 bold">รหัสผู้ป่วย</div>
        <div class="col-xs-10">123456789</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2 bold">ผู้ป่วย</div>
        <div class="col-xs-10">ชลัมพล ไก๊ไก่ไก๊ไก่</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-2 bold">ประวัติการแพ้ยา</div>
        <div class="col-xs-10">พารา</div>
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
              <th style="width: 45%;">วิธีใช้</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>พาราเซตาม่อง</td>
              <td>10 เม็ด</td>
              <td>ดม</td>
            </tr>
            <tr>
              <td>2</td>
              <td>ไวอากร้า</td>
              <td>2 ขวด</td>
              <td>แดก</td>
            </tr>
            <tr>
              <td>3</td>
              <td>เบตาดีน</td>
              <td>32 ช้อน</td>
              <td>ทา</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-8"></div>
        <div class="col-xs-4">
       {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
      </div>
    </div>
  </div>
</div>
</div>
{!! Form::close() !!}
@stop