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

var name;
var surname;
var department;
function editStaff(){
	name=$('#manageFirstname').text();
	surname=$('#manageSurname').text();
	department=$('#departmentName').text();
	$('#manageFirstname').html("<input class='form-control' name='name' type='text' value='" + name + "'>");
	$('#manageSurname').html("<input class='form-control' name='surname' type='text' value='" + surname + "'>");
	$('#departmentName').hide();
	$('#departmentDropdown').show();
	$('#manageButton').html("<button class ='btn btn-warning' id ='confirmEdit' onClick='cancelEdit()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitManage'>");
}
function cancelEdit(){
	$('#manageFirstname').html("<label for='name'>" + name + "</label>");
	$('#manageSurname').html("<label for='surname'>" + surname +"</label>");
	$('#departmentName').html("<label for='department'>" + department + "</label>");
	$('#departmentName').show();
	$('#departmentDropdown').hide();
	$('#manageButton').html("<button type='button' class='btn btn-warning' id='editStaffButton' onClick='editStaff()'>แก้ไข</button> <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal' id='deleteStaffButton'>ลบ</button>");
}
var name;
var surname;
var department;
var email;
function editProfile(){
	name=$('#staffName').text();
	surname=$('#staffSurname').text();
	department=$('#staffDepartment').text();
	departmentDropdown=$('#departmentDropdown').html();
	proficiency=$('#staffProficiency').text();
	email=$('#staffEmail').text();
	$('#staffName').html("<input class='form-control' name='name' type='text' value='" + name + "'>");
	$('#staffSurname').html("<input class='form-control' name='surname' type='text' value='" + surname + "'>");
	$('#staffDepartment').hide();
	$('#departmentDropdown').show();
	$('#staffProficiency').html("<input class='form-control' name='proficiency' type='text' value='proficiency'>");
	$('#staffEmail').html("<input class='form-control' name='email' type='text' value='" + email + "'>");
	$('#editProfileButton').html("<button class='btn btn-warning' onclick='cancelEditProfile()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitEditProfile'>");
}
function cancelEditProfile(){
	$('#staffName').html(name);
	$('#staffSurname').html(surname);
	$('#staffDepartment').html(department);
	$('#staffEmail').html(email);
	$('#staffProficiency').html(proficiency);
	$('#editProfileButton').html("<button class ='btn btn-warning' onClick='editProfile()'>แก้ไข</button>");
}

function setDelModal(i){
	i=i-1;
	var date = document.getElementsByName('diagDate[]');
	var time = document.getElementsByName('diagTime[]');
	var doc = document.getElementsByName('doctorName[]');
	name=$('#patientName').html(); 
	date = $(date[i]).html();
	time = $(time[i]).html();
	doc = $(doc[i]).html();
	$('#delDoc').html(doc); 
	$('#delDate').html(date);
	$('#delTime').html(time);
	$('#delName').html(name);
}