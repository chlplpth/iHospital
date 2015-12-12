@extends('layout/adminLayout')
@section('css')
<link href="{{asset('css/admin.css')}}" rel="stylesheet">
@stop
@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ให้สิทธิ์เจ้าหน้าที่</h3>
  </div>
  <div class="panel-body" style="margin-top: 2%; margin-left: 40px;">
    {!! Form::open(array('url' => '/grantStaff')) !!}
    <div class="form-group row">
      <div class="col-xs-2" id="adminLabel">{!! Form::label('keyword', 'ชื่อ / รหัสบุคลากร'); !!}</div>
      <div class="col-xs-3">{!! Form::text('keyword', '', ["class" => "form-control", 'placeholder'=>'ชลัมพล / 55321']) !!}
        @if( $errors->has('keyword') )<br>
        <p class="text-danger"> {{ $errors->first('keyword') }} </p> 
        @endif
      </div>
      <div class="col-xs-1">{!! Form::submit('ค้นหา', ["class" => "btn btn-default"]) !!}</div>
    </div>
    {!! Form::close() !!}


    @if(isset($staffs))
      @if(count($staffs) > 0)
      {!! Form::open(array('url' => '/grantStaffStore')) !!}
        <div class="form-group row" style="margin-bottom: 0px;">
          <div class="col-xs-9">
            <table id="grantStaff" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 40%;">ชื่อ</th>
                  <th style="width: 40%;">นามสกุล</th>
                  <th style="width: 20%;">สิทธิ์การแก้ไข</th>
                </tr>
              </thead>
              <tbody>
                @foreach($staffs as $staff)
                  <tr>
                    <td>{{ $staff->name }}</td>
                    {!! Form::hidden('staffs[]', $staff->userId) !!}
                    <td>{{ $staff->surname }}</td>
                    <td>{!! Form::checkbox('grant[]', $staff->userId, $staff->grant) !!}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="form-group row">
          <div class="col-xs-9" style="padding: 0px;">
            {!! Form::submit('ตกลง', ["class" => "btn btn-success"]) !!}
          </div>
        </div>
      </div>
    {!! Form::close() !!}
    @else
      ไม่พบเจ้าหน้าที่ที่ต้องการค้นหา
    @endif
  @endif
</div>
@stop