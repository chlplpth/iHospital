@extends('layouts.staffLayout')

		@section('content')
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id = "content">
			<div class="panel panel-default">
				<div class="panel-heading" id ="manageUserPanelHeader">จัดการบุคลากร</div>
				<div class = "row ">
					<div class ="col-md-7">
						<div class="input-group" id="hospitalStaff">
							<span class="input-group-addon" id="sizing-addon2">รหัสประจำตัวบุคลากร</span>
							<input type="text" class="form-control" aria-describedby="sizing-addon2" placeholder="HospitalID / Name" >
						</div>
					</div>
					<div class ="col-md-5">
						<button class="btn btn-default" type="button" id="searchButton"  aria-haspopup="true" aria-expanded="true">ค้นหา</button>
					</div>
				</div>
				<div id="userTable">
					<table class="table table-hover">
						<thead>

							<th id="id">รหัสประจำตัว</th>
							<th id= "name">ชื่อ</th>
							<th id= "surname">นามสกุล</th>
							<th id= "department">แผนก</th>
							<th id= "edit"></th>
							<th id= "delete"></th>
						</thead>
						<tbody>
						<tr>
							<td>00000001</td>
							<td>AAA</td>
							<td>aaa</td>
							<td>กกก</td>
							<td><button type="button" class="btn btn-warning">แก้ไข</button></td>
							<td><button type="button" class="btn btn-danger">ลบ</button></td>
						</tr>
						<tr>
							<td>00000002</td>
							<td>BBB</td>
							<td>bbb</td>
							<td>ขขข</td>
							<td><button type="button" class="btn btn-warning">แก้ไข</button></td>
							<td><button type="button" class="btn btn-danger">ลบ</button></td>
						</tr>
						<tr>
							<td>00000003</td>
							<td>CCC</td>
							<td>ccc</td>
							<td>คคค</td>
							<td><button type="button" class="btn btn-warning">แก้ไข</button></td>
							<td><button type="button" class="btn btn-danger">ลบ</button></td>
						</tr>
						<tr>
							<td>00000004</td>
							<td>DDD</td>
							<td>ddd</td>
							<td>งงง</td>
							<td><button type="button" class="btn btn-warning">แก้ไข</button></td>
							<td><button type="button" class="btn btn-danger">ลบ</button></td>
						</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</dev>
</dev>
@endsection

@section('css')
<link href="css/staffManageUser.css" rel="stylesheet">
@endsection