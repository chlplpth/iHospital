var name;
var surname;
var department;
var email;
function editProfile(){
	name=$('#pharmacistName').text();
	surname=$('#pharmacistSurname').text();
	department=$('#pharmacistDepartment').text();
	proficiency=$('#pharmacistProficiency').text();
	email=$('#pharmacistEmail').text();
	$('#pharmacistName').html("<input class='form-control' name='name' type='text' value='" + name + "'>");
	$('#pharmacistSurname').html("<input class='form-control' name='surname' type='text' value='" + surname + "'>");
	$('#pharmacistDepartment').hide();
	$('#departmentDropdown').show();
	$('#pharmacistEmail').html("<input class='form-control' name='email' type='text' value='" + email + "'>");
	$('#editProfileButton').html("<button class='btn btn-warning' onclick='cancelEditProfile()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitEditProfile'>");
}
function cancelEditProfile(){
	$('#pharmacistName').html(name);
	$('#pharmacistSurname').html(surname);
	$('#pharmacistDepartment').show();
	$('#departmentDropdown').hide();
	$('#pharmacistEmail').html(email);
	$('#pharmacistProficiency').html(proficiency);
	$('#editProfileButton').html("<button class ='btn btn-warning' onClick='editProfile()'>แก้ไข</button>");
}