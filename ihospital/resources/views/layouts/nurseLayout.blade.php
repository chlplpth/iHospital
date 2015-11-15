@extends('layouts.master')

@section('menu')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id = "menu">
          <ul class="nav nav-sidebar">
            <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbspค้นหาผู้ป่วย</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-list-alt" aria-hidden="true">&nbspกรอกข้อมูลผู้ป่วย</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbspตารางนัดหมาย</span></a></li>
          </ul>
     	</div>
    	
@endsection

@yield('content')