@extends('layouts.master')

@section('menu')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar" id = "menu">
      <ul class="nav nav-sidebar">
        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbspลงทะเบียนผู้ป่วยใหม่</span></a></li>
        <li><a href="/staffMakeAppointment"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbspสร้างการนัดหมาย</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbspจัดการการนัดหมาย</span></a></li>
        <li><a href="/staffImportSchedule"><span class="glyphicon glyphicon-import" aria-hidden="true">&nbspนำเข้าตารางการออกตรวจ</span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true">&nbspยกเลิกตารางการออกตรวจ</span></a></li>
        <li><a href="/staffManageUser"><span class="glyphicon glyphicon-cog" aria-hidden="true">&nbspจัดการบุคลากร</span></a></li>
      </ul>
    </div>

    @endsection

@yield('content')
