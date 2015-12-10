var name;
var surname;
var department;
var email;
function editProfile(){
	name=$('#nurseName').text();
	surname=$('#nurseSurname').text();
	department=$('#nurseDepartment').text();
	proficiency=$('#nurseProficiency').text();
	email=$('#nurseEmail').text();
	$('#nurseName').html("<input class='form-control' name='name' type='text' value='name'>");
	$('#nurseSurname').html("<input class='form-control' name='surname' type='text' value='surname'>");
	$('#nurseDepartment').html("<input class='form-control' name='department' type='text' value='department'>");
	$('#nurseProficiency').html("<input class='form-control' name='proficiency' type='text' value='proficiency'>");
	$('#nurseEmail').html("<input class='form-control' name='email' type='text' value='email'>");
	$('#editProfileButton').html("<button class='btn btn-warning' onclick='cancelEditProfile()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitEditProfile'>");
}
function cancelEditProfile(){
	$('#nurseName').html(name);
	$('#nurseSurname').html(surname);
	$('#nurseDepartment').html(department);
	$('#nurseEmail').html(email);
	$('#nurseProficiency').html(proficiency);
	$('#editProfileButton').html("<button class ='btn btn-warning' onClick='editProfile()'>แก้ไข</button>");
}