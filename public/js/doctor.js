var i=0;
var name;
var surname;
var department;
var proficiency;
var email;
function enAddMedButton(){
	if($('#medicineName').val()!=''
		&&($('#morningCh').prop("checked") == true
		||$('#noonCh').prop("checked") == true
		||$('#eveCh').prop("checked") == true
		||$('#niteCh').prop("checked") == true
		||$('#beforeMealCh').prop("checked") == true
		||$('#afterMealCh').prop("checked") == true
		||($('#otherCh').prop("checked") == true) && $('#medOther').val()!='')
		){
		$('#addMed').prop('disabled', false);
	}else{
		$('#addMed').prop('disabled', true);
	}
}
function addMedicine(){
	i++;
	var name = $('#medicineName').val();
	var qua = $('#quantity').val();
	var unit = '';
	if($('#unit').val()==0){
		unit = 'เม็ด';
	}else if($('#unit').val()==1){
		unit = 'ขวด';
	}
	var how = '';
	var medNote = $('#medNote').val();
	if($('#morningCh').prop("checked") == true){
		how=how+"เช้า  ";
	}
	if($('#noonCh').prop("checked") == true){
		how=how+"กลางวัน  ";
	}
	if($('#eveCh').prop("checked") == true){
		how=how+"เย็น  ";
	}
	if($('#niteCh').prop("checked") == true){
		how=how+"ก่อนนอน  ";
	}
	if($('#beforeMealCh').prop("checked") == true){
		how=how+"ก่อนอาหาร  ";
	}
	if($('#afterMealCh').prop("checked") == true){
		how=how+"หลังอาหาร  ";
	}
	if($('#otherCh').prop("checked") == true){
		how=how+$('#medOther').val();
	}
	var x = "<tr><td>"+i+"</td><td>"+name+"</td><td>"+qua+"</td><td>"+unit+"</td><td>"+how+"</td><td>"+medNote+"</td></tr>";
	x = x + "<input type='hidden' name='medName[]'' value='" + name + "'>";
	x = x + "<input type='hidden' name='medQuantity[]'' value='" + qua + "'>";
	x = x + "<input type='hidden' name='medUnit[]'' value='" + unit + "'>";
	x = x + "<input type='hidden' name='medInstruction[]'' value='" + how + "'>";
	x = x + "<input type='hidden' name='medNote[]'' value='" + medNote + "'>";
	$('#drugTable').append(x);
	$('#medicineName').val('');
	$('#quantity').val('');
	$('#niteCh').removeAttr('checked');
	$('#morningCh').removeAttr('checked');
	$('#eveCh').removeAttr('checked');
	$('#noonCh').removeAttr('checked');
	$('#beforeMealCh').removeAttr('checked');
	$('#afterMealCh').removeAttr('checked');
	$('#otherCh').removeAttr('checked');
	$('#medOther').val('');
	$('#medNote').val('');
	$('#addMed').prop('disabled', true);
}
function enNextApp(){
	if($('#date').val()==''){
		$('#newAppSubmit').prop('disabled', true);
	}else{
		$('#newAppSubmit').prop('disabled', false);
	}
}
function nextAppointment(){
	var date =$('#date').val();
	var period='';
	var periodEnum='';
	if($('#doctorRadioMorning').is(":checked")){
		period="เช้า (9.00-11.30)";
		periodEnum="morning";
	}else if($('#doctorRadioAfternoon').is(":checked")){
		period="บ่าย (13.00-15.30)";
		periodEnum="afternoon";
	}
	var detail=$('#nextAppDetail').val();
	var x= "นัดครั้งต่อไปวันที่ "+date+" "+period;
	var y= "<input type='hidden' name='nextAppDate' value='"+date+"'>"
			+ "<input type='hidden' name='nextAppTime' value='"+periodEnum+"'>"
			+ "<input type='hidden' name='nextAppDetail' value='"+detail+"'>";
	$('#nextAppointmentForm').html(y);
	$('#nextAppointment').html(x);

}
function editProfile(){
	name=$('#doctorName').text();
	surname=$('#doctorSurname').text();
	department=$('#doctorDepartment').text();
	departmentDropdown=$('#departmentDropdown').html();
	proficiency=$('#doctorProficiency').text();
	email=$('#doctorEmail').text();
	$('#doctorName').html("<input class='form-control' name='name' type='text' value='" + name + "''>");
	$('#doctorSurname').html("<input class='form-control' name='surname' type='text' value='" + surname + "'>");
	$('#doctorDepartment').hide();
	$('#departmentDropdown').show();
	$('#doctorProficiency').html("<input class='form-control' name='proficiency' type='text' value='" + proficiency + "'>");
	$('#doctorEmail').html("<input class='form-control' name='email' type='text' value='" + email + "'>");
	$('#editProfileButton').html("<button class='btn btn-warning' onclick='cancelEditProfile()'>ยกเลิก</button> <input class='btn btn-success' type='submit' value='ยืนยัน' id='submitEditProfile'>");
}
function cancelEditProfile(){
	$('#doctorName').html(name);
	$('#doctorSurname').html(surname);
	$('#doctorDepartment').show();
	$('#departmentDropdown').hide();
	$('#doctorEmail').html(email);
	$('#doctorProficiency').html(proficiency);
	$('#editProfileButton').html("<button class ='btn btn-warning' onClick='editProfile()'>แก้ไข</button>");
}