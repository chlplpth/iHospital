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
  		<div class="panel-body">
        <div class="row">
          <label class="col-xs-2">รหัสผู้ป่วย</label><label class="col-xs-10">123456789</label>
          <label class="col-xs-2">ชื่อ</label><label class="col-xs-10">ชลัมพล</label>
          <label class="col-xs-2">นามสกุล</label><label class="col-xs-10">ไก๊ไก่ไก๊ไก่</label>
          <label class="col-xs-2">ประวัติการแพ้ยา</label><label class="col-xs-10"></label>
          <div class="col-xs-10">
            <textarea class="form-control" rows="5" readonly></textarea>
          </div>
        </div>
        <div class="row" id="prescription">
          <label class="col-xs-2">ใบสั่งยา</label>
          <div class="col-xs-10">
            <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>รหัสยา</th>
                    <th>ชื่อยา</th>
                    <th>จำนวน</th>
                    <th>วิธีใช้</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>001</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Doctor</td>
                  </tr>
                  <tr>
                    <td>002</td>
                    <td>Mary</td>
                    <td>Moe</td>
                    <td>Nurse</td>
                  </tr>
                  <tr>
                    <td>003</td>
                    <td>July</td>
                    <td>Dooley</td>
                    <td>Staff</td>
                  </tr>
                </tbody>
              </table>
      		</div>
        </div>
        {!! Form::submit('ยืนยัน', ["class" => "btn btn-success"]) !!}

  		</div>
	</div>

	{!! Form::close() !!}
@stop