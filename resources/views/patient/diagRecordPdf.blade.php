<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body style ="font-size:14px;">
	<br>
	<h3>โรงพยาบาล iHospital </h3>
	<h5>ถนนพญาไท แขวงวังใหม่ เขตปทุมวัน กรุงเทพมหานคร 10330</h5>
	<h5>โทรศัพท์: (+66) 0-2218-6956-7&nbsp&nbsp&nbsp&nbsp&nbspโทรสาร: (+66) 0-2218-6955</h5>
	<span style="margin-left :10px;">================================================================================</span>
	<div style ="margin-left:50px;">
		<br>
		<h2>บันทึกการวินิจฉัย</h2> 
		<h3 style = "margin-left :400px;margin-top:-20px;">วันที่พิมพ์รายงาน : {{$date}}</h3>
		<div style="margin-left :20px; margin-top:-20px;">
			<div>
				<br>
				<span style ="font-weight:bold;">รหัสประจำตัวผู้ป่วย : </span>{{$HN}} 
				<br> <br>

				<div>
					<span style ="font-weight:bold;">ชื่อ : </span>{{$patName}}
					<span style ="left:400px; position: absolute;"><span style ="font-weight:bold;">นามสกุล : </span>{{$patLast}}</span>
				</div>
				<br>

				<div>
					<span style ="font-weight:bold;">เพศ : </span>{{$sex}}
					<span style ="left:260px; position: absolute;"><span style ="font-weight:bold;">กรุ๊ปเลือด : </span>{{$bloodType}}</span>
					<span style ="left:440px; position: absolute;"><span style ="font-weight:bold;">อายุ : </span>{{$age}}</span>

					<br><br>
				</div>
				<div class="row">
					<span style ="font-weight:bold;">แพทย์ : </span>{{$doctorName}} 
					<span style ="left:400px; position: absolute;"><span style ="font-weight:bold;">แผนก : </span>{{$department}}</span>
				</div>
				<br>

				<div class ="row">
					<span style ="font-weight:bold;">วันที่รับการตรวจ : </span>{{$diagDate}} 
					<span style ="left:400px; position: absolute;"><span style ="font-weight:bold;">เวลา : </span>9.00 น. -12.00 น.</span>
				</div>
				<br>
				<div class ="row">
					<span style ="font-weight:bold;">น้ำหนัก : </span>50 kg 
					<span style ="left:400px; position: absolute;"><span style ="font-weight:bold;">ส่วนสูง : </span>150 cm</span>
				</div>
				<br>
				<div class ="row">
					<span style ="font-weight:bold;">ความดันโลหิต : </span>20/120 mmph
					<span style ="left:400px; position: absolute;"><span style ="font-weight:bold;">อัตราการเต้นของหัวใจ : </span>70 bpm</span>
				</div>
				<br>
				<span style ="font-weight:bold;">อาการ : </span>{{$symptom}}
				<br><br>
				<span style ="font-weight:bold;">คำแนะนำจากแพทย์ : </span>{{$diag}} 
				<br><br>
				<span style ="font-weight:bold;">รายการยา</span> 
				<br><br>

				<table style = "width:500px;text-align:center; left :80px; position: absolute; border:1px solid black;">
					<thead >
						<tr>
							<th style="width: 75%; text-align:center; font-weight:bold;border:1px solid black;">ชื่อยา</th>
							<th style="width: 25%; text-align:center; font-weight:bold;border:1px solid black;">จำนวน</th>
						</tr>
					</thead>
					<tbody>
						@foreach($medicine as $med)
						<tr>
							<td style="border:1px solid black;">{{ $med['drugName'] }}</td>
							<td style="border:1px solid black;">{{ $med['quantity'] }}</td>
						</tr>
						@endforeach

					</tbody>
				</table>		
				<br><br>
			</div>
		</div>
	</div>
</div>
</body>
</html>