@extends('layout/adminLayout')

@section('content')
	{!! Form::open(array('url' => 'foo/bar')) !!}

	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">เพิ่มบุคลากร</h3>
  		</div>
  		<div class="panel-body">
    		
        <div class="form-inline">
    			{!! Form::label('id', 'รหัสบุคลากร'); !!} &nbsp
      		{!! Form::text('id', '', ["class" => "form-control"]) !!} &nbsp &nbsp

          {!! Form::label('role', 'บทบาท'); !!} &nbsp
          {!! Form::select('role', array('Doctor' => 'แพทย์', 'Nurse' => 'พยาบาล', 'Staff' => 'เจ้าหน้าที่', 'Phamacist' => 'เภสัชกร', 'Admin' => 'ผู้ดูแลระบบ'), null, ["class" => "form-control"]) !!} &nbsp &nbsp

          {!! Form::label('department', 'แผนก'); !!} &nbsp
          {!! Form::select('department', array('A' => 'หู', 'B' => 'ตา', 'C' => 'จมูก', 'D' => 'ปาก'), null, ["class" => "form-control"]) !!}
        </div>
        <br>

        {!! Form::label('name', 'ชื่อ'); !!} &nbsp
        {!! Form::text('name', '', ["class" => "form-control"]) !!}
        <br>

        {!! Form::label('surname', 'นามสกุล'); !!} &nbsp
        {!! Form::text('surname', '', ["class" => "form-control"]) !!}
        <br>
        
        <br>
    		{!! Form::submit('เพิ่ม', ["class" => "btn btn-success"]) !!}


  		</div>
	</div>

	{!! Form::close() !!}
@stop