<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta charset="utf-8">
</head>
<body style ="max-width:800px;">
	<img src="<?php echo $message->embed('image/iHospitalBanner.png'); ?>" style ="width:800px;">
	<br><br><br>
	<div style ="margin-left :50px;">
		เรียนคุณ {{$name}}{lastname} <br>
	</div><br><br>
	<div style ="margin-left :80px; width:700px;">เนื่องจากทางแพทย์{doctor}ไม่สามารถทำการออกตรวจได้ในวันที่ {date}เวลา {time}ทางเจ้าหน้าที่จึงทำการเปลี่ยนแปลงวันเวลานัดหมายเป็น วันที่{date} เวลา {time}
	</div><br>
	<div style ="margin-left :50px;">หากท่านไม่สะดวกในวันเวลาดังกล่าวสามารถเปลี่ยนแปลงการนัดหมายได้โดยติดต่อทางเข้าหน้าที่{tel} หรือทำการเปลี่ยนแปลงด้วยตนเองที่{link}
	</div>
	<br><br><br>
	<img src="<?php echo $message->embed('image/iHospitalfooter.png'); ?>" style ="width:800px;">
</body>
</html>