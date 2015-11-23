@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
@stop
@section('content')
{!! Form::open(array('url' => '/addMedicine')) !!}

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">เพิ่มยา</h3>
  </div>
  <div class="panel-body form" style="margin-left:40px; margin-top:10px;">
    <div class="form-group row">
      <div class="col-xs-2 adminLabel">{!! Form::label('id', 'รหัสยา'); !!}</div>
      <div class="col-xs-3">{!! Form::text('id', '', ["class" => "form-control", 'placeholder'=>'240200']) !!}
        @if( $errors->has('id') )<br>
        <p class="text-danger"> {{ $errors->first('id') }} </p> 
        @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2 adminLabel">{!! Form::label('name', 'ชื่อยา'); !!}</div>
      <div class="col-xs-3">{!! Form::text('name', '', ["class" => "form-control", 'placeholder'=>'Paracetamol']) !!}
        @if( $errors->has('name') )<br>
        <p class="text-danger"> {{ $errors->first('name') }} </p> 
        @endif
      </div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2 adminLabel">{!! Form::label('type', 'ประเภทยา'); !!}</div>
      <div class="col-xs-3">{!! Form::select('type', array('eat' => 'รับประทาน', 'touch' => 'ทา', 'drop' => 'หยอด', 'spray' => 'พ่น', 'injection' => 'ฉีด','other' => 'อื่นๆ'), null, ["class" => "form-control"]) !!}</div>
    </div>
    <div class="form-group row">
      <div class="col-xs-2 adminLabel">{!! Form::label('description', 'รายละเอียดยา'); !!}</div>
      <div class="col-xs-3">{!! Form::textarea('description', '', ["class" => "form-control",'placeholder'=>'ยานี้อยู่ในรูปแบบยาเม็ด โดยทั่วไปรับประทานทุกๆ 4-6 ชั่วโมงเมื่อมีอาการปวด ' , 'rows' => '3']) !!}

        @if( $errors->has('description') )<br>
        <p class="text-danger"> {{ $errors->first('description') }} </p> 
        @endif
      </div>
    </div> 
    <div class="form-group row">
      <div class="col-xs-2"></div>
      <div class="col-xs-3">{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}</div>
    </div>
  </div>
</div>
</div>

{!! Form::close() !!}
@stop