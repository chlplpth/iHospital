@extends('layouts/staffLayout')

		@section('content')
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
			<div class="panel panel-default">
				<div class="panel-heading" id ="editUserPanelHeader">แก้ไขข้อมูลบุคลากร</div>
				<br>
				<div class = "row">
					<div class ="col-md-7">
						<div class="input-group" id="hospitalStaff">
							<span class="input-group-addon" id="sizing-addon2">รหัสประจำตัวบุคลากร</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="00000001" disabled>
						</div>
					</div>
				</div>

				<div class = "row">
					<div class ="col-md-6">
						<div class="input-group" id="name">
							<span class="input-group-addon" id="sizing-addon2">ชื่อ</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "AAA" disabled>
						</div>
					</div>
					<div class ="col-md-6">
						<div class="input-group" id="surname">
							<span class="input-group-addon" id="sizing-addon2">นามสกุล</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder = "aaa" disabled>
						</div>
					</div>
				</div>

				<div class = "row">
					<div class ="col-md-6">
						<div class="btn-group" role="group" aria-label="..." id ="department">
							<button type="button" class="btn btn-default">แผนก</button>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									หู คอ จมูก
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">หู คอ จมูก</a></li>
									<li><a href="#">อายุรกรรม</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<button class="btn btn-default" type="button" id="editButton"  aria-haspopup="true" aria-expanded="true">แก้ไขข้อมูล</button>
			</div>
		</div>
	</dev>
</dev>
@endsection

@section('css')
<link href="css/staffEditUser.css" rel="stylesheet">
@endsection