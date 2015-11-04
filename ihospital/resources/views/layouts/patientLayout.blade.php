@extends('layouts.master')

@section('menu')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-md-2 sidebar" id = "menu">
      <ul class="nav nav-sidebar">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbspลงทะเบียน</span></a></li>
      </ul>
    </div>

@endsection

@yield('content')