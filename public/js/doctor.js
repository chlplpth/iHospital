var i=0;
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
	var x = "<tr><td>"+i+"</td><td>"+name+"</td><td>"+qua+"</td><td>"+unit+"</td><td>"+how+"</td>";
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
	if($('#doctorRadioMorning').is(":checked")){
		period="เช้า (9.00-11.30)";
	}else if($('#doctorRadioAfternoon').is(":checked")){
		period="บ่าย (13.00-15.30)";
	}
	var x= "นัดครั้งต่อไปวันที่ "+date+" "+period;
	$('#nextAppointment').html(x);
}