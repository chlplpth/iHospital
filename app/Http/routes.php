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
    return view('general/login');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/register', function () {
    return view('general/register');
});

Route::get('/changePassword', function () {
    return view('general/changePassword');
});

Route::get('/forgetPassword', function () {
    return view('general/forgetPassword');
});


Route::get('staff', function() {
	return view('layout/staffLayout');
});

Route::get('addPatient', function() {
	return view('staff/addPatient');
});

Route::get('createAppointment', function() {
	return view('patient/createAppointment');
});

Route::get('editProfile', function() {
	return view('patient/editProfile');
});

Route::get('patientProfile', function() {
	return view('patient/patientProfile');
});

Route::get('/addDepartment', function () {
    return view('admin/addDepartment');
});

Route::get('/addMedicine', function () {
    return view('admin/addMedicine');
});

Route::get('/addStaff', function () {
    return view('admin/addStaff');
});

Route::get('/grantStaff', function () {
    return view('admin/grantStaff');
});


Route::get('/mainPharmacist', function () {
    return view('pharmacist/main');
});

Route::get('/recordPrescriptionHistory', function () {
    return view('pharmacist/recordPrescriptionHistory');
});

Route::get('/findPatient', function () {
    return view('pharmacist/findPatient');
});

