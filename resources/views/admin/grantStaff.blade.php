@extends('layout/adminLayout')

@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">ให้สิทธิ์เจ้าหน้าที่</h3>
  		</div>
  		<div class="panel-body">
    		
        <div class="form-inline">
    			{!! Form::label('id', 'ชื่อ / รหัสบุคลากร'); !!} &nbsp
      		{!! Form::text('id', '', ["class" => "form-control"]) !!} &nbsp
          {!! Form::submit('ค้นหา', ["class" => "btn btn-primary"]) !!}
        </div>
        <br>

        <div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>รหัสประจำตัว</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>บทบาท</th>
                <th>เลือก</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>001</td>
                <td>John</td>
                <td>Doe</td>
                <td>Doctor</td>
                <td>{!! Form::radio('name', 'value'); !!}</td>
              </tr>
              <tr>
                <td>002</td>
                <td>Mary</td>
                <td>Moe</td>
                <td>Nurse</td>
                <td>{!! Form::radio('name', 'value'); !!}</td>
              </tr>
              <tr>
                <td>003</td>
                <td>July</td>
                <td>Dooley</td>
                <td>Staff</td>
                <td>{!! Form::radio('name', 'value'); !!}</td>
              </tr>
            </tbody>
          </table>
        <div>
        <br>

        <div class="panel panel-default">
          <div class="panel-heading">เลือกสิทธิ์</div>
          <div class="panel-body">
            <form role="form">
              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 1
              </label>
              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 2
              </label>
              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 3
              </label>
              <br>

              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 4
              </label>
              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 5
              </label>
              <label class="checkbox-inline">
                {!! Form::checkbox('name', 'value'); !!} Option 6
              </label>
              <br>

            </form>
          </div>
        </div>
        <br>

    		<br>
    		{!! Form::submit('ตกลง', ["class" => "btn btn-success"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop