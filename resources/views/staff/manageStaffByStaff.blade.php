@extends('layout/staffLayout')
@section('css')
<link href="{{asset('css/staff.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">จัดการบุคลากร</h3>
</div>
<div class="panel-body" style="margin-top:2%; margin-left: 40px;">
    <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('keyword', 'ชื่อหรือรหัสบุคลากร'); !!}</div>
      <div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control", 'placeholder'=>'กรอกชื่อหรือรหัสบุคลากร']) !!}</div>
      <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
  </div>
  <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('id', 'รหัสบุคลากร'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('id', '123456789'); !!}</div>
  </div>
  <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
  </div>
  <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('surname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
  </div>
  <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('department', 'แผนก'); !!}</div>
      <div class="col-xs-3" id="staffLabel">{!! Form::label('department', 'พยาธิวิทยา'); !!}</div>
  </div>
  <div class="form-group row">
   <div class="col-xs-2"></div>
   <div class="col-xs-3">
    <button type="button" data-toggle="collapse" data-target="#manage" class="btn btn-info" style="width:45%;">แก้ไข</button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" style="float:right; width:45%;">ลบ</button>
</div>
</div>
<div id="manage" class="collapse form-group row">
   <label class="col-xs-2" id="staffLabel"></label>
   <div class=" col-xs-7 panel panel-default" style="padding: 0px;">
      <div class="panel-heading" id="infoBtnColor">
         <h3 class="panel-title" id="infoBtnColor">แก้ไขข้อมูลบุคลากร</h3>
     </div>
     <div class="panel-body form" style="margin-left:40px; margin-top:2%;">
         <div class="form-group row">
          <div class="col-xs-2" id="staffLabel">{!! Form::label('name', 'ชื่อ'); !!}
          </div>
          <div class="col-xs-3">{!! Form::text('name', 'ชลัมพล', ["class" => "form-control", 'placeholder'=>'ชื่อใหม่']) !!}
          </div>
<!--                 </div>
    <div class="form-group row"> -->
      <div class="col-xs-2" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}
      </div>
      <div class="col-xs-3">{!! Form::text('surname', 'ไก๊ไก่ไก๊ไก่', ["class" => "form-control", 'placeholder'=>'นามสกุลใหม่']) !!}
      </div>
  </div>
  <div class="form-group row">
      <div class="col-xs-2" id="staffLabel">{!! Form::label('department', 'แผนก'); !!}
      </div>
      <div class="col-xs-3">{!! Form::select('department', array(
        '0' => 'ไม่ระบุ',
        '1' => 'กายวิภาคศาสตร์', 
        '2' => 'กุมารเวชศาสตร์',
        '3' => 'จิตเวชศาสตร์',
        '4' => 'จุลชีววิทยา',
        '5' => 'จักษุวิทยา',
        '6' => 'ชีวเคมี',
        '7' => 'นิติเวชศาสตร์',
        '8' => 'ปรสิตวิทยา',
        '9' => 'พยาธิวิทยา',
        '10' => 'เภสัชวิทยา',
        '11' => 'รังสีวิทยา',
        '12' => 'วิสัญญีวิทยา',
        '13' => 'เวชศาสตร์ชันสูตร',
        '14' => 'เวชศาสตร์ป้องกันและสังคม',
        '15' => 'เวชศาสตร์ฟื้นฟู',
        '16' => 'ศัลยศาสตร์',
        '17' => 'สรีรวิทยา',
        '18' => 'สุติศาสตร์-นารีเวชวิทยา',
        '19' => 'โสต คอ นาสิกวิทยา',
        '20' => 'ออโธปิดิกส์',
        '21' => 'อายุรศาสตร์'), '9', ["class" => "form-control"]) !!}
    </div>
</div>
</div>
<div class="form-group row">
    <div class="col-xs-10"><button style="float: right;" type="button" class="btn btn-success">ตกลง</button></div>
</div>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id="dangerBtnColor">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ลบข้อมูลบุคลากร</h4>
      </div>
      <div class="modal-body" style="margin-top:2%; margin-left: 40px;">
          <div class="form-group row">
              <div class="col-xs-3" id="staffLabel">{!! Form::label('id', 'รหัสบุคลากร'); !!}</div>
              <div class="col-xs-9" id="staffLabel">{!! Form::label('id', '123456789'); !!}</div>
          </div>
          <div class="form-group row">
              <div class="col-xs-3" id="staffLabel">{!! Form::label('name', 'ชื่อบุคลากร'); !!}</div>
              <div class="col-xs-9" id="staffLabel">{!! Form::label('name', 'ชลัมพล'); !!}</div>
          </div>
          <div class="form-group row">
              <div class="col-xs-3" id="staffLabel">{!! Form::label('surname', 'นามสกุล'); !!}</div>
              <div class="col-xs-9" id="staffLabel">{!! Form::label('surname', 'ไก๊ไก่ไก๊ไก่'); !!}</div>
          </div>
          <div class="form-group row">
              <div class="col-xs-3" id="staffLabel">{!! Form::label('department', 'แผนก'); !!}</div>
              <div class="col-xs-9" id="staffLabel">{!! Form::label('department', 'พยาธิวิทยา'); !!}</div>
          </div>
      </div>
      <div class="modal-footer">
        <span style="float:left; margin-top: 1%;">ยืนยันทำการลบข้อมูลของบุคลากร</span>
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        {!! Form::submit('ยืนยัน', ["class" => "btn btn-danger"]) !!}
      </div>
  </div>
</div>
</div>
</div>
</div>
{!! Form::close() !!}
@stop