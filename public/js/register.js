function citizenNoCheck(){
	var id = document.getElementsByName('citizenNo');
	var no = id[0].value;
	var er = /^-?[0-9]+$/;
	if(no.length!=13){
		console.log(no.length);
		$('.submitCitizenNo').prop('disabled', true);
		document.getElementById('citizenError').innerHTML = 'กรุณาใส่เลขประจำตัวประชาชน 13 หลัก';
	}else{
		console.log(no);
		if(er.test(no)){
			console.log(no.length);
			$('.submitCitizenNo').prop('disabled', false);
			document.getElementById('citizenError').innerHTML = '';
		}
	}
	
}
function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode > 31 && (charCode < 48 || charCode > 57)) {
		return false;
	}
	return true;
}
function addDrug(){
	$('.drugAllergy').append("<br><br><input class='textbox' placeholder='ยา' onkeyup='enableAddDrugButton()' name='drugAllergy[]' type='text' value='' style ='margin-left:40px'>");
	$('.addDrug').prop('disabled', true);
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
		$('.addDrug').prop('disabled', true);
	}else{
		$('.addDrug').prop('disabled', false);
	}
}
