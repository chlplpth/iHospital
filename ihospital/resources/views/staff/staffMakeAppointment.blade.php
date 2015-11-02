@extends('layouts.master')
@section('css')
<link href="css/staffMakeAppointment.css" rel="stylesheet">
@endsection
@section('menu')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar" id = "menu">
			<ul class="nav nav-sidebar">
				<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbspลงทะเบียนผู้ป่วยใหม่</span></a></li>
				<li class="active"><a href="#"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbspสร้างการนัดหมาย</span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true">&nbspจัดการการนัดหมาย</span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-import" aria-hidden="true">&nbspนำเข้าตารางการออกตรวจ</span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true">&nbspยกเลิกตารางการออกตรวจ</span></a></li>
				<li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true">&nbspจัดการบุคลากร</span></a></li>
			</ul>
		</div>

		@endsection
		@section('content')
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
			<div class="panel panel-default">
				<div class="panel-heading" id ="makeAppointmentPanelHeader">สร้างการนัดหมาย</div>
				<br>

				<div class="input-group" id="hn">
					<span class="input-group-addon" id="sizing-addon2">รหัสประจำตัวผู้ป่วย</span>
					<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="H.N. Number" >
				</div>

				<div class="btn-group" role="group" aria-label="..." id ="department">
					<button type="button" class="btn btn-default">แผนก</button>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ไม่ระบุ...
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				</div>
				<div class="btn-group" role="group" aria-label="..." id ="doctor">
					<button type="button" class="btn btn-default">แพทย์</button>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ไม่ระบุ...
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</div>
				</div>
				<div id ="symptom">
					<button class="btn btn-default" type="button" aria-haspopup="true" aria-expanded="true" id = "symptomButton" disabled>อาการเบื้องต้น</button>
					<br><br>
					<textarea name="text" cols="50" rows="5" id = "symptomTextarea"></textarea>
				</div>
				<div class="input-group" id="appointmentDate">
					<span class="input-group-addon" id="sizing-addon2">วันเวลา</span>
						<div class="input-group date" id="appointmentDateInput">
							<input type='text' class="form-control" />
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
				</div>
				<div class="input-group"><button class="btn btn-default" type="button" id="submitButton"  aria-haspopup="true" aria-expanded="true">ยืนยัน</button></div>
			</div>
		</div>
	</dev>
</dev>
@endsection