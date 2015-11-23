<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body style ="max-width:800px; border:1px solid #8bd48e; background-color: #fffde9;">
	 <img src="<?php echo $message->embed('image/iHospitalBanner.png'); ?>" style ="width:800px;">
	<br><br><br>
	<div style ="margin-left :20px;">
		เรียนคุณ {{$name}} {{$surname}} <br>
	</div><br><br>
	<table border="0" style="width :700px; margin-left :50px;">
		<thead>
			<th style ="width:50%"></th>
			<th style ="width:50%"></th>
		</thead>
		<tr>
			<td>รหัสผู้ป่วย : {{$HN}}</td>
			<td>ชื่อ-นามสกุล ผู้ป่วย : {{$name}} {{$surname}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>วันที่นัดหมาย : {{$date}}</td>
			<td>เวลาที่นัดหมาย : {{$time}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>แพทย์ที่นัด : {{$doctor}}</td>
			<td>แผนก : {{$department}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>อาคาร/ชั้น/ห้อง : {{$place}}</td>
			<td>เบอร์โทรแผนก : {{$tel}}</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>หมายเหตุ : {{$remark}}
			</td>
			<td>
			</td>
		</tr>
	</table>
	<br><br>
	<div style ="margin-left :50px;">
		หากท่านต้องการทำการเปลี่ยนแปลงการนัดหมายทำได้โดย<br>
		1. เปลี่ยนแปลงการนัดหมายโดยตรงกับเจ้าหน้าที่ทางโทรศัพท์ (+66) 0-2218-6956-7<br>
		2. ทำการเปลี่ยนแปลงด้วยตนเองผ่านเว็บไซต์ <a href="{{$link}}">{{$link}}</a>
	</div><br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px; padding-bottom:20px;">

</body>
</html>