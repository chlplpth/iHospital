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
		คุณได้รับอีเมลนี่เนื่องจากคุณได้แจ้งลืมรหัสผ่านเข้าใช้งานระบบiHospital ของโรงพยาบาล {hospitalname}<br>
		ชื่อผู้ใช้งานของคุณคือ {username}<br>
		กรุณาคลิกที่ลิ้งก์ด้านล้างเพื่อทำการเปลี่ยนตั้งค่ารหัสผ่านใหม่<br>
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