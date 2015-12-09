function addDrug(){
	$('.drugAllergy').append("<br><br><input class='textbox drugTextbox' placeholder='ยา' onkeyup='enableAddDrugButton()' name='drugAllergy[]' type='text' value='' style ='margin-left:60px'>");
	$('#addDrugButton').prop('disabled', true);
}
function enableAddDrugButton(){
	var x = document.getElementsByName("drugAllergy[]");
	var check=0;
	for(i=0;i<x.length;i++){
		if(x[i].value==""){
			check=1;
		}
	}
	if(check==1){
		$('#addDrugButton').prop('disabled', true);
	}else{
		$('#addDrugButton').prop('disabled', false);
	}
}
function toggleProficiency(){
	var x=$("#userType").val();
	if(x=='doctor'){
		$('#special').prop('hidden',false);
	}else{
		$('#special').prop('hidden',true);
	}
}
function editStaff(){
	$('#manageFirstname').html("<input class='form-control' name='name' type='text' value='ชลัมพล'>");
	$('#manageSurname').html("<input class='form-control' name='surname' type='text' value='ไก๊ไก่ไก๊ไก่'>");
	$('#manageDepartment').html("<select class='form-control' id='department' name='department'><option value='0'>ไม่ระบุ</option><option value='1'>กายวิภาคศาสตร์</option><option value='2'>กุมารเวชศาสตร์</option><option value='3'>จิตเวชศาสตร์</option><option value='4'>จุลชีววิทยา</option><option value='5'>จักษุวิทยา</option><option value='6'>ชีวเคมี</option><option value='7'>นิติเวชศาสตร์</option><option value='8'>ปรสิตวิทยา</option><option value='9' selected='selected'>พยาธิวิทยา</option><option value='10'>เภสัชวิทยา</option><option value='11'>รังสีวิทยา</option><option value='12'>วิสัญญีวิทยา</option><option value='13'>เวชศาสตร์ชันสูตร</option><option value='14'>เวชศาสตร์ป้องกันและสังคม</option><option value='15'>เวชศาสตร์ฟื้นฟู</option><option value='16'>ศัลยศาสตร์</option><option value='17'>สรีรวิทยา</option><option value='18'>สุติศาสตร์-นารีเวชวิทยา</option><option value='19'>โสต คอ นาสิกวิทยา</option><option value='20'>ออโธปิดิกส์</option><option value='21'>อายุรศาสตร์</option></select>");
	$('#manageButton').html("<button class ='btn btn-warning' id ='confirmEdit' onClick='cancelEdit()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitManage'>");
}
function cancelEdit(){
	$('#manageFirstname').html("<label for='name'>ชลัมพล</label>");
	$('#manageSurname').html("<label for='surname'>ไก๊ไก่ไก๊ไก่</label>");
	$('#manageDepartment').html("<label for='department'>พยาธิวิทยา</label>");
	$('#manageButton').html("<button type='button' class='btn btn-warning' id='editStaffButton' onClick='editStaff()'>แก้ไข</button> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal' id='deleteStaffButton'>ลบ</button>");
}
