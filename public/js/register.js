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
