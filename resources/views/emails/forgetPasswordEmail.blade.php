<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body style ="max-width:800px; border:1px solid #8bd48e; background-color: #fffde9;">
	<img src="<?php echo $message->embed('image/iHospitalBanner.png'); ?>" style ="width:800px;">
	<br><br><br>
	<div style ="margin-left :50px;">
		เรียนคุณ {{$name}} {{$surname}} <br>
	</div><br><br>
	<div style ="margin-left :120px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;คุณได้รับอีเมลนี่เนื่องจากคุณได้แจ้งลืมรหัสผ่านเข้าใช้งานระบบiHospital ของโรงพยาบาล iHospital<br>
		ชื่อผู้ใช้งานของคุณคือ {{$username}}<br>
		กรุณาคลิกที่ลิ้งก์ด้านล้างเพื่อทำการเปลี่ยนตั้งค่ารหัสผ่านใหม่<br>
		<a href="{{$link}}">{{$link}}</a><br><br>
	</div>
	<div style ="margin-left :50px;">
		ขอบพระคุณ
	</div><br><br>
	<div style ="margin-left :50px;">
		หากท่านต้องการข้อมูลเพิ่มเติมโปรดติดต่อทางโรงพยาบาล (+66) 0-2218-6956-7
	</div><br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px; padding-bottom:20px;">
</body>
</html>