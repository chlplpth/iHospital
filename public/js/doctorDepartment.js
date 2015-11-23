function changeDropdown(dd)
{
	x = dd.value;
	$('#doctorName').html(doctor[x]);
	// console.log(doctor[x]);
	// console.log($('#doctorName'));
}