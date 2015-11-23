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