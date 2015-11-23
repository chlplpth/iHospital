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
	<div style ="margin-left :80px; width:600px;">เนื่องจากทางแพทย์ {{$doctor}}ไม่สามารถทำการออกตรวจได้ในวันที่ {{$date}} เวลา {{$time}} <br>ทางเจ้าหน้าที่จึงทำการเปลี่ยนแปลงวันเวลานัดหมายเป็น วันที่{{$newDate}} เวลา {{$newTime}}
	</div><br>
	<div style ="margin-left :50px; width:600px">หากท่านไม่สะดวกในวันเวลาดังกล่าวสามารถเปลี่ยนแปลงการนัดหมายได้โดย<br>1. ติดต่อทางเจ้าหน้าที่ {{$tel}} <br>2. ทำการเปลี่ยนแปลงด้วยตนเองที่ <a href="{{$link}}">{{$link}}</a><br><br>
	</div>
	<br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px; padding-bottom:20px;">
</body>
</html>