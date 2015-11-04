<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',function(){
	return view('login');
});
Route::get('doctor',function(){
	return view('doctor.doctorHome');
});
Route::get('doctorRecordDiagnosis',function(){
	return view('doctor.doctorRecordDiagnosis');
});
Route::get('doctorRecordDiagnosis2',function(){
	return view('doctor.doctorRecordDiagnosis2');
});
Route::get('staff',function(){
	return view('staff.staffHome');
});
Route::get('staffMakeAppointment',function(){
	return view('staff.staffMakeAppointment');
});
Route::get('staffImportSchedule',function(){
	return view('staff.staffImportSchedule');
});
Route::get('staffManageUser',function(){
	return view('staff.staffManageUser');
});
Route::get('staffEditUser',function(){
	return view('staff.staffEditUser');
});
Route::get('patientRegister',function(){
	return view('patient.patientRegister');
});