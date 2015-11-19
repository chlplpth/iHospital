@extends('layout/patientLayout')
@section('css')
<link href="css/patient.css" rel="stylesheet">
@stop
@section('content')

{!! Form::open(array('url' => 'foo/bar')) !!}

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">แก้ไขข้อมูลส่วนตัว</h3>
	</div>
	<div class="panel-body">


		{!! Form::label('id', 'รหัสประจำตัวผู้ป่วย'); !!} &nbsp
		{!! Form::text('id','Patient ID', ['class'=>'textbox textbox100px','disabled'=>'true' ]); !!} 
		<br> <br>
		
		<div class="row">
			<div class="col-md-4"> {!! Form::label('firstname', 'ชื่อจริง'); !!} &nbsp
				{!! Form::text('firstname', 'ชื่อจริง', ['class'=>'textbox']);!!} 
			</div>
			<div class="col-md-8">{!! Form::label('lastname', 'นามสกุล'); !!} &nbsp
				{!! Form::text('lastname', 'นามสกุล', ['class'=>'textbox']); !!}
			</div>
		</div>
		<br>

		<div class ="row">
			<div class ="col-md-2">
				{!!Form::label('sex', 'เพศ');!!} &nbsp
				{!! Form::text('sex','ชาย', ['class'=>'textbox textbox50px','disabled'=>'true' ]); !!} 
			</div>
			<div class ="col-md-2">
				{!!Form::label('bloodType', 'กรุ๊ปเลือด');!!} &nbsp
				{!! Form::text('id','O', ['class'=>'textbox textbox50px','disabled'=>'true' ]); !!} 
			</div>	
			<div class ="col-md-8">
				{!!Form::label('birthDate', 'วัน/เดือน/ปี เกิด');!!}
				{!!Form::text('birthDate','วัน/เดือน/ปี เกิด',['class'=>'textbox','disabled'=>'true' ]);!!}

			</div>
		</div>

		<br>
		<div class ="row">

			<div class ="col-md-2">
				{!!Form::label('addressNo', 'บ้านเลข');!!}&nbsp
				{!!Form::text('addressNo','บ้านเลขที่',['class'=>'textbox textbox70px']);!!}<br><br>
			</div>
			<div class ="col-md-2">
				{!!Form::label('moo', 'หมู่');!!}&nbsp
				{!!Form::text('moo','หมู่',['class'=>'textbox textbox70px']);!!}<br><br>
			</div>	
			<div class ="col-md-3">
				{!!Form::label('street', 'ถนน');!!}&nbsp
				{!!Form::text('street','ถนน',['class'=>'textbox textbox150px']);!!}<br><br>
			</div>
			<div class ="col-md-4">
				{!!Form::label('subdistrict', 'แขวง/ตำบล');!!}&nbsp
				{!!Form::text('subdistrict','แขวง/ตำบล',['class'=>'textbox textbox150px']);!!}<br><br>
			</div>
			<div class ="col-md-1">
			</div>
		</div>
		<br>
		<div class ="row">

			<div class ="col-md-4">
				{!!Form::label('district', 'เขต/อำเภอ');!!}&nbsp
				{!!Form::text('district','เขต/อำเภอ',['class'=>'textbox textbox150px']);!!}<br><br>
			</div>
			<div class ="col-md-3 form-inline province">
				{!!Form::label('province', 'จังหวัด');!!}&nbsp
				{!!Form::select('province', array('0'=>'กรุงเทพมหานคร','1'=>'กระบี่','2'=>'กาญจนบุรี','3'=>'กาฬสินธุ์','4'=>'กำแพงเพชร','5'=>'ขอนแก่น','6'=>'จันทบุรี','7'=>'ฉะเชิงเทรา','8'=>'ชลบุรี','9'=>'ชัยนาท','10'=>'ชัยภูมิ','11'=>'ชุมพร','12'=>'เชียงราย','13'=>'เชียงใหม่','14'=>'ตรัง','15'=>'ตราด','16'=>'ตาก','17'=>'นครนายก','18'=>'นครปฐม','19'=>'นครพนม','20'=>'นครราชสีมา','21'=>'นครศรีธรรมราช','22'=>'นครสวรรค์','23'=>'นนทบุรี','24'=>'นราธิวาส','25'=>'น่าน','26'=>'บึงกาฬ','27'=>'บุรีรัมย์','28'=>'ปทุมธานี','29'=>'ประจวบคีรีขันธ์','30'=>'ปราจีนบุรี','31'=>'ปัตตานี','32'=>'พระนครศรีอยุธยา','33'=>'พังงา','34'=>'พัทลุง','35'=>'พิจิตร','36'=>'พิษณุโลก','37'=>'เพชรบุรี','38'=>'เพชรบูรณ์','39'=>'แพร่','40'=>'พะเยา','41'=>'ภูเก็ต','42'=>'มหาสารคาม','43'=>'มุกดาหาร','44'=>'แม่ฮ่องสอน','45'=>'ยะลา','46'=>'ยโสธร','47'=>'ร้อยเอ็ด','48'=>'ระนอง','49'=>'ระยอง','50'=>'ราชบุรี','51'=>'ลพบุรี','52'=>'ลำปาง','53'=>'ลำพูน','54'=>'เลย','55'=>'ศรีสะเกษ','56'=>'สกลนคร','57'=>'สงขลา','58'=>'สตูล','59'=>'สมุทรปราการ','60'=>'สมุทรสงคราม','61'=>'สมุทรสาคร','62'=>'สระแก้ว','63'=>'สระบุรี','64'=>'สิงห์บุรี','65'=>'สุโขทัย','66'=>'สุพรรณบุรี','67'=>'สุราษฎร์ธานี','68'=>'สุรินทร์','69'=>'หนองคาย','70'=>'หนองบัวลำภู','71'=>'อ่างทอง','72'=>'อุดรธานี','73'=>'อุทัยธานี','74'=>'อุตรดิตถ์','75'=>'อุบลราชธานี','76'=>'อำนาจเจริญ'),'0',["class" => "form-control"]);!!}<br><br>
			</div>	
			<div class ="col-md-4">
				{!!Form::label('zipcode', 'รหัสไปรษณีย์');!!}&nbsp
				{!!Form::text('street','รหัสไปรษณีย์',['class'=>'textbox textbox150px']);!!}<br><br>
			</div>
			<div class ="col-md-1">
			</div>
		</div>
		<br>
		<div class ="row">

			<div class ="col-md-5">
				{!!Form::label('telHome','โทรศัพท์บ้าน');!!}&nbsp
				{!!Form::text('telHome','โทรศัพท์บ้าน',['class'=>'textbox']);!!}
			</div>
			<div class ="col-md-6">
				{!!Form::label('telMobile','โทรศัพท์มือถือ');!!}&nbsp
				{!!Form::text('telMobile','โทรศัพท์มือถือ',['class'=>'textbox']);!!}
			</div>
			<div class ="col-md-1">
			</div>
		</div>

		<br>

		{!! Form::label('emailAddress', 'อีเมล'); !!} &nbsp
		{!! Form::text('emailAddress', 'kamdekdee@hotmail.com', ['class'=>'textbox textbox300px']);!!}

		<br><br>
		{!! Form::submit('แก้ไข', ["class" => "btn btn-warning edit"]) !!}
		{!! Form::close() !!}




	</div>
</div>
@stop
