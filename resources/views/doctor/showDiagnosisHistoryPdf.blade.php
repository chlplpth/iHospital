<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body style ="font-size:14px;">
	<h3>โรงพยาบาล iHospital </h3>
	<h5>ถนนพญาไท แขวงวังใหม่ เขตปทุมวัน กรุงเทพมหานคร 10330</h5>
	<h5>โทรศัพท์: (+66) 0-2218-6956-7&nbsp&nbsp&nbsp&nbsp&nbspโทรสาร: (+66) 0-2218-6955</h5>
	<span style="margin-left :10px;">================================================================================</span>
	<div style ="margin-left:50px;">
		<h2 style ="margin-left:-50px;">สถิติการออกตรวจประจำเดือน {{$month}}</h2> 
		<h3 style = "margin-left :380px;margin-top:-20px;">วันที่พิมพ์รายงาน : {{$date}}</h3>
		<span style ="margin-top:-10px;position: absolute;"><span style="font-weight:bold;">แพทย์ : </span>{{$doctorName}}</span> 
		<span style ="left:400px; position: absolute;margin-top:-10px;"><span style ="font-weight:bold;">แผนก : </span>{{$department}}</span>
		<br>
		<table class ="page"style = "width:500px;text-align:center; left :80px; position: absolute; border:1px solid black;">
		<thead>
			<tr>
				<th style="border:1px solid black;">วัน/เดือน/ปี</th>
				<th style="border:1px solid black;">เช้า</th>
				<th style="border:1px solid black;">บ่าย</th>
				<th style="border:1px solid black;">รวม</th>
			</tr>
		</thead>
		<tbody>
			@foreach($diag as $diagnosis)
						<tr>
							<?php 
								$sum=(int)$diagnosis['morning']+(int)$diagnosis['afternoon'];
							?>
							<td style="border:1px solid black;">{{ $diagnosis['diagDate'] }}</td>
							<td style="border:1px solid black;">{{ $diagnosis['morning'] }}</td>
							<td style="border:1px solid black;">{{ $diagnosis['afternoon']}}</td>
							<td style="border:1px solid black;">{{ $sum }}</td>
						</tr>
			@endforeach
		</tbody>
		</table>
	</div>

</body>
</html>
