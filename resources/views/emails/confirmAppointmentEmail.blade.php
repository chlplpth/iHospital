<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body style ="max-width:800px; border:2px solid black;">
	 <img src="<?php echo $message->embed('image/iHospitalBanner.png'); ?>" style ="width:800px;">
	<br><br><br>
	<div style ="margin-left :50px;">
		เรียนคุณ {name}{lastname} <br>
	</div><br><br>
	<table border="0" style="width :700px; margin-left :50px;">
		<thead>
			<th style ="width:50%"></th>
			<th style ="width:50%"></th>
		</thead>
		<tr>
			<td>รหัสผู้ป่วย : {HN}</td>
			<td>ชื่อ-นามสกุล ผู้ป่วย : {name}{lastname}</td>
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
			<td>วัน/เวลา นัดหมาย : {date}{time}</td>
			<td></td>
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
			<td>แพทย์ที่นัด : {doctor}</td>
			<td>แผนก : {department}&nbsp&nbspอาคาร/ชั้น/ห้อง : {place}</td>
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
			<td>เบอร์โทรแผนก : {tel}</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>หมายเหตุ : {remark}
			</td>
			<td>
			</td>
		</tr>
	</table>
	<br><br>
	<div style ="margin-left :50px;">
		หากท่านต้องการทำการเปลี่ยนแปลงการนัดหมายทำได้โดย<br>
		1. เปล่ยนแปลงการนัดหมายโดยตรงกับเจ้าหน้าที่ทางโทรศัพท์ 02-xxx-xxxx<br>
		2. ทำการเปลี่ยนแปลงด้วยตนเองผ่านเว็บไซต์ {link}
	</div><br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px;">
</body>
</html>