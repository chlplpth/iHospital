<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body style ="max-width:800px;">
	<img src="<?php echo $message->embed('image/iHospitalBanner.png'); ?>" style ="width:800px;">
	<br><br><br>
	<div style ="margin-left :50px;">
		เรียนคุณ {name}{lastname} <br>
	</div><br><br>
	<div style ="margin-left :120px;">
		ขอขอบคุณที่ลงทะเบียนเข้าใช้งานในระบบiHospital ของโรงพยาบาล {hospitalname}<br>
		ชื่อผู้ใช้งานของคุณคือ {username}<br>
		กรุณาคลิกที่ลิ้งก์ด้านล่างเพื่อทำการสร้างรหัสผ่านของท่าน<br>
		{link}<br><br>
	</div>
	<div style ="margin-left :50px;">
		ขอบพระคุณ
	</div><br><br>
	<div style ="margin-left :50px;">
		หากท่านต้องการข้อมูลเพิ่มเติมโปรดติดต่อทางโรงพยาบาล 02-xxx-xxxx
	</div><br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px;">
</body>
</html>