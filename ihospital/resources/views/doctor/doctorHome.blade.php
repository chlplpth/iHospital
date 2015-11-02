@extends('layouts.master')

@section('menu')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id = "menu">
          <ul class="nav nav-sidebar">
            <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true">&nbspค้นหาผู้ป่วย</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true">&nbspบันทึกการออกตรวจ</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbspตารางออกตรวจ</span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true">&nbspสรุปผล</span></a></li>
          </ul>
     	</div>
    	
@endsection

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
          <h1 class="page-header">Welcome [Username]</h1>
          
</div>
</div>
</div>
@endsection