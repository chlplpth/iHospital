@extends('layout/staffLayout')
@section('css')
<link href="css/staff.css" rel="stylesheet">
@stop
@section('content')
  {!! Form::open(array('url' => 'foo/bar')) !!}

  <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ตารางการออกตรวจ</h3>
      </div>
      <div class="panel-body" style="margin-top: 2%; margin-left: 40px;">
        <form role="form">
          <div class="form-group row">
            <div class="col-xs-12">{!! Form::label('name', 'ชื่อหรือรหัสแพทย์'); !!}</div>
            <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control", 'placeholder'=>'กรอกชื่อหรือรหัสแพทย์']) !!}</div>
            <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
          </div>
          <div class="form-group row">
            <div class="col-xs-12"><h1>ตาราง ยังไม่ได้คิด ปฏิทิน?</h1>
            </div>
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