@extends('layout/pharmacistLayout')
@section('css')
<link href="css/pharmacist.css" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">บันทึกประวัติการจ่ายยา</h3>
  </div>
  <div class="panel-body" style="margin-left:40px;">
    <div class="row">
      <label class="col-xs-2 moveDown2">รหัสผู้ป่วย</label>
      <label class="col-xs-10 moveDown2">123456789</label>
      <label class="col-xs-2 moveDown2">ชื่อ</label>
      <label class="col-xs-10 moveDown2">ชลัมพล</label>
      <label class="col-xs-2 moveDown2">นามสกุล</label>
      <label class="col-xs-10 moveDown2">ไก๊ไก่ไก๊ไก่</label>
      <label class="col-xs-2 moveDown2">ประวัติการแพ้ยา</label>
      <div class="col-xs-7 moveDown2">
        <textarea id="loseMed" class="form-control" rows="5" readonly></textarea>
      </div>
    </div>
    <div class="form-group row moveDown2" id="prescription">
      <label class="col-xs-2">ใบสั่งยา</label>
      <div class="col-xs-7">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th style="width: 5%;">ลำดับ</th>
              <th style="width: 10%;">รหัสยา</th>
              <th style="width: 20%;">ชื่อยา</th>
              <th style="width: 5%;">จำนวน</th>
              <th style="width: 5%;">หน่วย</th>
              <th style="width: 35%;">วิธีใช้</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>001</td>
              <td>พาราเซตาม่อง</td>
              <td>10</td>
              <td>เม็ด</td>
              <td>ดม</td>
            </tr>
            <tr>
              <td>2</td>
              <td>002</td>
              <td>ไวอากร้า</td>
              <td>2</td>
              <td>ขวด</td>
              <td>แดก</td>
            </tr>
            <tr>
              <td>3</td>
              <td>003</td>
              <td>เบตาดีน</td>
              <td>32</td>
              <td>ช้อน</td>
              <td>ทา</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-9">
        {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}
      </div>
    </div>
  </div>
</div>

{!! Form::close() !!}
@stop