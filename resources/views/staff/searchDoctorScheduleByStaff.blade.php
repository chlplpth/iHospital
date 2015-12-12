@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
  {!! Form::open(array('url' => 'foo/bar')) !!}

  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ตารางการออกตรวจ</h3>
      </div>
      <div class="panel-body" style="margin-top: 2%; margin-left: 40px;">
        <span class ="bold">ชื่อหรือนามสกุลตัวแพทย์&nbsp;&nbsp;</span>
        <form role="form">
          <div class="form-group row">
        <div class="col-xs-3"><select id="searchbox" name="q" placeholder="กรอกชื่อหรือรหัสแพทย์" class="form-control"></select></div>
      </div>
        </form>
        <script type="text/javascript">
      // When the document is ready
      $(document).ready(function () {
        $('.datepicker').datepicker();
      });
      </script>
      </div>
  </div>
  {!! Form::close() !!}
@stop

<script>
var root = '{{url("/")}}';
var searchAddress = '/search/manageScheduleByStaff';
</script>