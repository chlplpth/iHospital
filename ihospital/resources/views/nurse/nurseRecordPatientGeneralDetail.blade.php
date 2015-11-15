@extends('layouts/nurseLayout')

		@section('content')
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
			<div class="panel panel-default">
				<div class="panel-heading" id ="registerPanelHeader">บันทึกข้อมูลทั่วไปของผู้ป่วย</div>
				<br>
				
				<div class = "row">
					<div class ="col-md-6">
						<div class="input-group" id="name">
							<span class="input-group-addon" id="sizing-addon2">ชื่อ</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "name">
						</div>
					</div>
					<div class ="col-md-6">
						<div class="input-group" id="surname">
							<span class="input-group-addon" id="sizing-addon2">นามสกุล</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "surname">
						</div>
					</div>
				</div>

				<div class = "row">
					<div class ="col-md-3">
						<div class="input-group" id="weight">
							<span class="input-group-addon" id="sizing-addon2">น้ำหนัก</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "kg">
						</div>
					</div>
					<div class ="col-md-3">
						<div class="input-group" id="height">
							<span class="input-group-addon" id="sizing-addon2">ส่วนสูง</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "cm">
						</div>
					</div>
					<div class ="col-md-3">
						<div class="input-group" id="heartRate">
							<span class="input-group-addon" id="sizing-addon2">อัตราการเต้นหัวใจ</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "heartRate">
						</div>
					</div>
				</div>


				<div class = "row">
					<div class ="col-md-3">
						<div class="input-group" id="temperature">
							<span class="input-group-addon" id="sizing-addon2">อุณหภูมิร่างกาย</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "37">
						</div>
					</div>
					<div class ="col-md-3">
						<div class="input-group" id="systolicPressure">
							<span class="input-group-addon" id="sizing-addon2">ความดันโลหิตสูงสุด</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "120">
						</div>
					</div>
					<div class ="col-md-3">
						<div class="input-group" id="DyastolicPressure">
							<span class="input-group-addon" id="sizing-addon2">ความดันโลหิตต่ำสุด</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "80">
						</div>
					</div>
				</div>


				<div id ="address">
					อาการเบื้องต้น <br>
					<textarea name="text" cols="50" rows="5" id = "symptomTextarea"></textarea>
				</div>
				
				<button class="btn btn-default" type="button" id="recordButton"  aria-haspopup="true" aria-expanded="true">บันทึกข้อมูล</button>
			</div>
		</div>
	</dev>
</dev>


@endsection

@section('css')
<link href="css/staffEditUser.css" rel="stylesheet">
@endsection