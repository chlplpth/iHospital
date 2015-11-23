<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">

  <title>iHospital</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
  <link href="{{asset('css/datepicker.css')}}" rel="stylesheet">
  @yield('css')
  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
 
  </head>

  <body>

    <nav class="navbar navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h3><a href="{{ url('/') }}">iHospital</a></h3>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">{{ Auth::user()->name }} &nbsp; {{ Auth::user()->lastname }}</a></li>
            <li><a href="#">ข้อมูลส่วนตัว</a></li>
            <li><a href="{{ url('/logout') }}">ออกจากระบบ</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
           <li class="{{ Request::is('searchPatientProfileByNurse') ? 'active' : '' }}">
              <a href="{{ url('/searchPatientProfileByNurse') }}"> ค้นหาผู้ป่วย<span class="sr-only">(current)</span></a>
            </li>
            <li class="{{ Request::is('recordPatientGeneralDetail') ? 'active' : '' }}">
              <a href="{{ url('/recordPatientGeneralDetail') }}">บันทึกข้อมูลทั่วไปของผู้ป่วย</a>
            </li>
            <li class="{{ Request::is('doctorScheduleByNurse') ? 'active' : '' }}">
              <a href="{{ url('/doctorScheduleByNurse') }}">ตารางนัดหมาย</a>
            </li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
