@extends('layouts.master')
@section('css')
@endsection
@section('menu')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar" id = "menu">
      <ul class="nav nav-sidebar">
        <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbspค้นหาผู้ป่วย</span></a></li>
        <li class="active"><a href="#"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true">&nbspบันทึกการออกตรวจ</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbspตารางออกตรวจ</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbspสรุปผล</span></a></li>
      </ul>
    </div>

    @endsection

    @section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
      <div class="panel panel-default">

        <div class="panel-heading">รายการการนัดหมาย</div>

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>ลำดับที่</th>
                <th>รหัสผู้ป่วย</th>
                <th>ผู้ป่วย</th>
                <th>เวลา</th>
                <th>บันทึกการออกตรวจ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1 </td>
                <td>H.N.00000001</td>
                <td>นางสาวชลธร ขวัญขจรเกียรติ</td>
                <td>9.00-11.30 น.</td>
                <td><button type="button" class="btn btn-default">บันทึก</button></td>
              </tr>
              <tr>
                <td>2 </td>
                <td>H.N.00000002</td>
                <td>นายณภัทร ช่างผาสุข</td>
                <td>9.00-11.30 น.</td>
                <td><button type="button" class="btn btn-default">บันทึก</button></td>
              </tr>
              <tr>
                <td>3 </td>
                <td>H.N.00000003</td>
                <td>นายชลัมพล ลาภธนัญชัยวงศ์</td>
                <td>13.00-15.00 น.</td>
                <td><button type="button" class="btn btn-default">บันทึก</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>    
    </div>
  </div>
</div>
@endsection