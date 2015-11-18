@extends('layout/unregisteredLayout')
@section('css')
<link href="css/register.css" rel="stylesheet">
@stop
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">ลงทะเบียน</h3>
	</div>
	{!! Form::open(array('url' => 'register')) !!}
	{!! Form::hidden('userType', 'patient') !!}
	<div class="panel-body">
		<div class ="row">
			<div class ="col-md-1"></div>
			<div class ="col-md-11">
				{!!Form::label('citizenNo', 'รหัสประจำตัวประชาชน');!!}&nbsp
				{!!Form::text('citizenNo','',['class'=>'textbox','placeholder'=>'รหัสประจำตัวประชาชน']);!!}
				{!!Form::button('ยืนยัน',['class'=>'btn btn-default submitCitizenNo']);!!}
			</div>
		</div>
		<br>
		<div class="panel panel-default profile">
			<div class="panel-heading">
				<h3 class="panel-title">ประวัติส่วนตัว</h3>
			</div>
			<div class="panel-body">
				<div class ="row">
					<div class ="col-md-1">
					</div>
					<div class ="col-md-11">
						{!!Form::label('name', 'ชื่อ');!!}&nbsp
						{!!Form::text('name','',['class'=>'textbox','placeholder'=>'ชื่อ']);!!}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						{!!Form::label('lastname', 'นามสกุล');!!}&nbsp
						{!!Form::text('lastname','',['class'=>'textbox','placeholder'=>'นามสกุล']);!!}<br><br>
					</div>
				</div>
				<div class ="row">
					<div class ="col-md-1">
					</div>
					<div class ="col-md-2"><br>
						{!!Form::label('sex', 'เพศ');!!}&nbsp&nbsp&nbsp{!!Form::radio('sex', 'M', true);!!}&nbsp{!!Form::label('male', 'ชาย');!!}&nbsp&nbsp{!!Form::radio('sex', 'F', false);!!}&nbsp{!!Form::label('female', 'หญิง');!!}
					</div>
					<div class ="col-md-2"><br>
						{!!Form::label('bloodGroup', 'กรุ๊ปเลือด');!!}
						{!!Form::select('bloodGroup', array('A' => 'A', 'B' => 'B', 'O' => 'O', 'AB' => 'AB'));!!}
					</div>
					<div class ="col-md-7 birthDate"><br>
						{!!Form::label('dateOfBirth', 'วัน/เดือน/ปี เกิด');!!}
						{!!Form::text('dateOfBirth','',['class'=>'textbox','placeholder'=>'วว/ดด/ปป']);!!}
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default contact">
			<div class="panel-heading">
				<h3 class="panel-title">ข้อมูลการติดต่อ</h3>
			</div>
			<div class="panel-body">
				<div class ="row">
					<div class ="col-md-1">
					</div>
					<div class ="col-md-2">
						{!!Form::label('addressNo', 'เลขที่');!!}&nbsp
						{!!Form::text('addressNo','',['class'=>'textbox textbox70px','placeholder'=>'เลขที่']);!!}<br><br>
					</div>
					<div class ="col-md-2">
						{!!Form::label('moo', 'หมู่');!!}&nbsp
						{!!Form::text('moo','',['class'=>'textbox textbox70px','placeholder'=>'หมู่']);!!}<br><br>
					</div>	
					<div class ="col-md-3">
						{!!Form::label('street', 'ถนน');!!}&nbsp
						{!!Form::text('street','',['class'=>'textbox textbox150px','placeholder'=>'ถนน']);!!}<br><br>
					</div>
					<div class ="col-md-4">
						{!!Form::label('subdistrict', 'แขวง/ตำบล');!!}&nbsp
						{!!Form::text('subdistrict','',['class'=>'textbox textbox150px','placeholder'=>'แขวง/ตำบล']);!!}<br><br>
					</div>
				</div>
				<br>
				<div class ="row">
					<div class ="col-md-1">
					</div>
					<div class ="col-md-3">
						{!!Form::label('district', 'เขต/อำเภอ');!!}&nbsp
						{!!Form::text('district','',['class'=>'textbox textbox150px','placeholder'=>'เขต/อำเภอ']);!!}<br><br>
					</div>
					<div class ="col-md-3 form-inline province">
						{!!Form::label('province', 'จังหวัด');!!}&nbsp
						{!!Form::select('province', array('0'=>'กรุงเทพมหานคร','1'=>'กระบี่','2'=>'กาญจนบุรี','3'=>'กาฬสินธุ์','4'=>'กำแพงเพชร','5'=>'ขอนแก่น','6'=>'จันทบุรี','7'=>'ฉะเชิงเทรา','8'=>'ชลบุรี','9'=>'ชัยนาท','10'=>'ชัยภูมิ','11'=>'ชุมพร','12'=>'เชียงราย','13'=>'เชียงใหม่','14'=>'ตรัง','15'=>'ตราด','16'=>'ตาก','17'=>'นครนายก','18'=>'นครปฐม','19'=>'นครพนม','20'=>'นครราชสีมา','21'=>'นครศรีธรรมราช','22'=>'นครสวรรค์','23'=>'นนทบุรี','24'=>'นราธิวาส','25'=>'น่าน','26'=>'บึงกาฬ','27'=>'บุรีรัมย์','28'=>'ปทุมธานี','29'=>'ประจวบคีรีขันธ์','30'=>'ปราจีนบุรี','31'=>'ปัตตานี','32'=>'พระนครศรีอยุธยา','33'=>'พังงา','34'=>'พัทลุง','35'=>'พิจิตร','36'=>'พิษณุโลก','37'=>'เพชรบุรี','38'=>'เพชรบูรณ์','39'=>'แพร่','40'=>'พะเยา','41'=>'ภูเก็ต','42'=>'มหาสารคาม','43'=>'มุกดาหาร','44'=>'แม่ฮ่องสอน','45'=>'ยะลา','46'=>'ยโสธร','47'=>'ร้อยเอ็ด','48'=>'ระนอง','49'=>'ระยอง','50'=>'ราชบุรี','51'=>'ลพบุรี','52'=>'ลำปาง','53'=>'ลำพูน','54'=>'เลย','55'=>'ศรีสะเกษ','56'=>'สกลนคร','57'=>'สงขลา','58'=>'สตูล','59'=>'สมุทรปราการ','60'=>'สมุทรสงคราม','61'=>'สมุทรสาคร','62'=>'สระแก้ว','63'=>'สระบุรี','64'=>'สิงห์บุรี','65'=>'สุโขทัย','66'=>'สุพรรณบุรี','67'=>'สุราษฎร์ธานี','68'=>'สุรินทร์','69'=>'หนองคาย','70'=>'หนองบัวลำภู','71'=>'อ่างทอง','72'=>'อุดรธานี','73'=>'อุทัยธานี','74'=>'อุตรดิตถ์','75'=>'อุบลราชธานี','76'=>'อำนาจเจริญ'),'0',["class" => "form-control"]);!!}<br><br>
					</div>	
					<div class ="col-md-3">
						{!!Form::label('zipcode', 'รหัสไปรษณีย์');!!}&nbsp
						{!!Form::text('zipcode','',['class'=>'textbox textbox150px','placeholder'=>'รหัสไปรษณีย์']);!!}<br><br>
					</div>
					<div class ="col-md-3">
					</div>

				</div>
				<br>
				<div class ="row">
					<div class ="col-md-1">
					</div>
					<div class ="col-md-5">
						{!!Form::label('telHome','โทรศัพท์บ้าน');!!}&nbsp
						{!!Form::text('telHome','',['class'=>'textbox','placeholder'=>'โทรศัพท์บ้าน']);!!}
					</div>
					<div class ="col-md-6">
						{!!Form::label('telMobile','โทรศัพท์มือถือ');!!}&nbsp
						{!!Form::text('telMobile','',['class'=>'textbox','placeholder'=>'โทรศัพท์มือถือ']);!!}
					</div>
				</div>
				<br>
				<div class= "row">
					<div class="col-md-1">
					</div>
					<div class="col-md-11 drugAllergy" >
						{!!Form::label('email','อีเมล');!!}&nbsp
						{!!Form::text('email','',['class'=>'textbox','placeholder'=>'อีเมล']);!!}
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default drug">
			<div class="panel-heading">
				<h3 class="panel-title">ประวัติการแพ้ยา</h3>
			</div>
			<div class="panel-body">
				<div class= "row">
					<div class="col-md-1">
					</div>
					<div class="col-md-11 drugAllergy" >
						{!!Form::label('drugAllergy','ชื่อยา');!!}&nbsp
						{!!Form::text('drugAllergy[]','',['class'=>'textbox','placeholder'=>'ยา']);!!}
						{!!Form::button('เพิ่ม',['class'=>'btn btn-default addDrug']);!!}
					</div>
				</div>
			</div>
		</div>	
		<div class="panel panel-default auth">
			<div class="panel-heading">
				<h3 class="panel-title">ข้อมูลการใช้งานระบบ</h3>
			</div>
			<div class="panel-body">
				<div class= "row">
					<div class="col-md-1">
					</div>
					<div class="col-md-11" >
						{!!Form::label('username','ชื่อผู้ใช้');!!}&nbsp&nbsp&nbsp
						{!!Form::text('username','',['class'=>'textbox','placeholder'=>'ชื่อผู้ใช้']);!!}
					</div>
				</div>
				<br><br>
				<div class= "row">
					<div class="col-md-1">
					</div>
					<div class="col-md-4" >
						{!!Form::label('password','รหัสผ่าน');!!}&nbsp
						{!!Form::text('password','',['class'=>'textbox','placeholder'=>'รหัสผ่าน']);!!}
					</div>
					<div class="col-md-7" >
						{!!Form::label('repassword','ยืนยันรหัสผ่าน');!!}&nbsp
						{!!Form::text('repassword','',['class'=>'textbox','placeholder'=>'ยืนยันรหัสผ่าน']);!!}
					</div>
				</div>
			</div>
		</div>
		{!!Form::submit('ลงทะเบียน',['class'=>'btn btn-success register']);!!}	
	</div>
	{!! Form::close() !!}
	
</div>
@stop